<?php

declare(strict_types=1);

namespace App\Services\Sewing;

class EfficiencyService
{
    public function efficiencyPercent(int $actualQty, string $smv, int $operators, int $minutes = 60): string
    {
        if ($operators <= 0 || $minutes <= 0 || (float) $smv <= 0) {
            return '0.0000';
        }

        $earned = $actualQty * (float) $smv;
        $available = $operators * $minutes;
        $percent = ($earned / $available) * 100;

        return number_format($percent, 4, '.', '');
    }

    public function dhu(int $defects, int $inspected): string
    {
        if ($inspected <= 0) {
            return '0.0000';
        }

        return number_format(($defects / $inspected) * 100, 4, '.', '');
    }
}
