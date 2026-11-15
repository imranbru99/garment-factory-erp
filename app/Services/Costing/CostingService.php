<?php

declare(strict_types=1);

namespace App\Services\Costing;

use InvalidArgumentException;

/**
 * Pre-cost and what-if FOB. Money is integer minor units.
 * Efficiency is a fraction: 0.65 means 65 percent.
 */
class CostingService
{
    /**
     * @param  array<string, int>  $components
     */
    public function fobMinor(array $components): int
    {
        $keys = ['fabric_minor', 'trims_minor', 'cm_minor', 'wash_minor', 'print_minor', 'test_minor', 'overhead_minor', 'commercial_minor', 'profit_minor'];
        $total = 0;
        foreach ($keys as $key) {
            $total += (int) ($components[$key] ?? 0);
        }

        return $total;
    }

    public function cmMinor(string $smv, string $efficiency, int $lineCostMinorPerHour): int
    {
        $efficiencyValue = (float) $efficiency;
        if ($efficiencyValue <= 0 || $efficiencyValue > 1) {
            throw new InvalidArgumentException('Efficiency must be a fraction between 0 and 1.');
        }

        if ((float) $smv < 0 || $lineCostMinorPerHour < 0) {
            throw new InvalidArgumentException('SMV and line cost cannot be negative.');
        }

        $perMinute = $lineCostMinorPerHour / 60;

        return (int) round(($perMinute * (float) $smv) / $efficiencyValue);
    }

    /**
     * @param  array<string, int|float|string>  $base
     * @return array{fob_minor: int, fabric_minor: int, cm_minor: int}
     */
    public function whatIf(array $base, float $fabricFactor, float $exchangeFactor, string $efficiency): array
    {
        $fabric = (int) round(((int) $base['fabric_minor']) * $fabricFactor * $exchangeFactor);
        $cm = $this->cmMinor((string) $base['smv'], $efficiency, (int) $base['line_cost_minor']);
        $components = [
            'fabric_minor' => $fabric,
            'trims_minor' => (int) ($base['trims_minor'] ?? 0),
            'cm_minor' => $cm,
            'wash_minor' => (int) ($base['wash_minor'] ?? 0),
            'print_minor' => (int) ($base['print_minor'] ?? 0),
            'test_minor' => (int) ($base['test_minor'] ?? 0),
            'overhead_minor' => (int) ($base['overhead_minor'] ?? 0),
            'commercial_minor' => (int) ($base['commercial_minor'] ?? 0),
            'profit_minor' => (int) ($base['profit_minor'] ?? 0),
        ];

        return [
            'fob_minor' => $this->fobMinor($components),
            'fabric_minor' => $fabric,
            'cm_minor' => $cm,
        ];
    }
}
