<?php

declare(strict_types=1);

namespace App\Services\Sewing;

/**
 * Suggests the bottleneck from an operation bulletin.
 * Capacity is pieces per hour: operators * 60 / SMV.
 *
 * @phpstan-type Operation array{name: string, smv: float|int|string, operators: int}
 */
class LineBalanceService
{
    /**
     * @param  list<Operation>  $operations
     * @return array{name: string, pieces_per_hour: float}|null
     */
    public function bottleneck(array $operations): ?array
    {
        $slowest = null;
        foreach ($operations as $operation) {
            $smv = (float) $operation['smv'];
            $operators = (int) $operation['operators'];
            if ($smv <= 0 || $operators <= 0) {
                continue;
            }
            $rate = ($operators * 60) / $smv;
            if ($slowest === null || $rate < $slowest['pieces_per_hour']) {
                $slowest = ['name' => (string) $operation['name'], 'pieces_per_hour' => $rate];
            }
        }

        return $slowest;
    }
}
