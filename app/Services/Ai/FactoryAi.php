<?php

declare(strict_types=1);

namespace App\Services\Ai;

use App\Models\Issue;
use ImranDevBd\AiCatalog\Facades\AiCatalog;
use ImranDevBd\AiHub\Facades\AIHub;
use ImranDevBd\AiOcr\Facades\AiOcr;
use Throwable;

/**
 * Every model call goes through laravel-ai-hub, laravel-ai-ocr or laravel-ai-catalog.
 * With AI disabled the same features return null and the manual path stays available.
 */
class FactoryAi
{
    public function enabled(): bool
    {
        return (bool) config('garment.ai_enabled');
    }

    public function suggestIssuePlan(Issue $issue): ?string
    {
        if (! $this->enabled()) {
            return null;
        }

        try {
            $response = AIHub::prompt('Suggest a root cause and action plan for this garment factory issue: '.$issue->name.'. '.$issue->description)
                ->generate();

            return $response->content;
        } catch (Throwable) {
            return null;
        }
    }

    public function morningSummary(string $facts): ?string
    {
        if (! $this->enabled()) {
            return null;
        }

        try {
            return AIHub::prompt('Write a short English and Bangla morning briefing for a garment factory GM. Facts: '.$facts)->generate()->content;
        } catch (Throwable) {
            return null;
        }
    }

    /**
     * @return array<string, mixed>
     */
    public function extractDocument(string $path): array
    {
        try {
            $request = AiOcr::file($path);
            if (! $this->enabled()) {
                $request = $request->manualOnly();
            }

            return $request->extract()->data();
        } catch (Throwable) {
            return [];
        }
    }

    public function catalogFromText(string $text): ?string
    {
        if (! $this->enabled()) {
            return null;
        }

        try {
            $generation = AiCatalog::generate(AiCatalog::fromText($text));

            return (string) $generation->getKey();
        } catch (Throwable) {
            return null;
        }
    }
}
