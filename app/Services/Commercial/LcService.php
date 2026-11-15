<?php

declare(strict_types=1);

namespace App\Services\Commercial;

use App\Models\LetterOfCredit;
use RuntimeException;

class LcService
{
    public function utilize(LetterOfCredit $lc, int $amountMinor): LetterOfCredit
    {
        $next = (int) $lc->utilized_minor + $amountMinor;
        if ($amountMinor < 0 || $next > (int) $lc->amount_minor) {
            throw new RuntimeException('LC utilization exceeds the available balance.');
        }

        $lc->utilized_minor = $next;
        $lc->save();

        return $lc;
    }

    public function utilizationPercent(int $amountMinor, int $utilizedMinor): string
    {
        if ($amountMinor <= 0) {
            return '0.0000';
        }

        return number_format(($utilizedMinor / $amountMinor) * 100, 4, '.', '');
    }

    public function backToBackMarginPercent(int $exportMinor, int $btbMinor): string
    {
        if ($exportMinor <= 0) {
            return '0.0000';
        }

        return number_format((($exportMinor - $btbMinor) / $exportMinor) * 100, 4, '.', '');
    }
}
