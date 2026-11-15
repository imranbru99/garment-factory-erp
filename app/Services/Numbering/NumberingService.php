<?php

declare(strict_types=1);

namespace App\Services\Numbering;

use App\Models\NumberingCounter;
use App\Models\NumberingSeries;
use App\Models\Unit;
use App\Support\BanglaDate;
use Illuminate\Support\Facades\DB;
use Tarikh\Tarikh;

class NumberingService
{
    public function next(string $documentType, ?int $unitId, string $prefix): string
    {
        return DB::transaction(function () use ($documentType, $unitId, $prefix): string {
            $series = NumberingSeries::query()->firstOrCreate(
                ['document_type' => $documentType, 'unit_id' => $unitId],
                ['name' => strtoupper($prefix).' series', 'prefix' => $prefix, 'padding' => 6],
            );

            $fiscal = BanglaDate::fiscalCode(new Tarikh('now'));
            $counter = NumberingCounter::query()
                ->where('numbering_series_id', $series->id)
                ->where('fiscal_year', $fiscal)
                ->where('unit_id', $unitId)
                ->lockForUpdate()
                ->first();

            if (! $counter instanceof NumberingCounter) {
                $counter = NumberingCounter::query()->create([
                    'name' => $prefix.' '.$fiscal,
                    'numbering_series_id' => $series->id,
                    'fiscal_year' => $fiscal,
                    'unit_id' => $unitId,
                    'last_number' => 0,
                ]);
            }

            $counter->last_number = (int) $counter->last_number + 1;
            $counter->save();

            $unitCode = 'XX';
            if ($unitId) {
                $code = Unit::query()->whereKey($unitId)->value('code');
                $unitCode = is_string($code) && $code !== '' ? $code : 'U'.$unitId;
            }

            return sprintf('%s-%s-%s-%s', $series->prefix, $unitCode, $fiscal, str_pad((string) $counter->last_number, (int) $series->padding, '0', STR_PAD_LEFT));
        });
    }
}
