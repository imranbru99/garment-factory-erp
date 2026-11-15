<?php

declare(strict_types=1);

namespace App\Services\Payroll;

use Carbon\CarbonInterface;

/**
 * Bangladesh RMG payroll. Rates come from config/garment.php and are never hardcoded here.
 */
class PayrollService
{
    /**
     * @return array{ot_minor: int, net_minor: int, flags: list<string>}
     */
    public function calculate(int $basicMinor, string $otHours, int $bonusMinor = 0, int $incentiveMinor = 0, int $advanceMinor = 0, int $deductionMinor = 0): array
    {
        $rules = config('garment.payroll');
        $days = max(1, (int) $rules['days_per_month']);
        $hours = max(1, (int) $rules['hours_per_day']);
        $multiplier = (float) $rules['ot_multiplier'];
        $hourly = $basicMinor / ($days * $hours);
        $otMinor = (int) round($hourly * (float) $otHours * $multiplier);
        $net = $basicMinor + $otMinor + $bonusMinor + $incentiveMinor - $advanceMinor - $deductionMinor;
        $flags = [];
        if ((float) $otHours > (float) $rules['max_ot_hours_per_month']) {
            $flags[] = 'ot_limit';
        }

        return [
            'ot_minor' => $otMinor,
            'net_minor' => $net,
            'flags' => $flags,
        ];
    }

    public function isUnderage(CarbonInterface $dateOfBirth, ?CarbonInterface $on = null): bool
    {
        $on ??= now();
        $minimum = (int) config('garment.payroll.minimum_age', 18);

        return $dateOfBirth->diff($on)->y < $minimum;
    }
}
