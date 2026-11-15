<?php

declare(strict_types=1);

namespace App\Services\Quality;

use InvalidArgumentException;

/**
 * Single sampling, general inspection level II, normal severity.
 * Accept/reject numbers follow the garment-industry ANSI Z1.4 charts used on the floor.
 */
class AqlService
{
    /** @var array<int, array{n: int, limits: array<string, array{0: int, 1: int}>}> */
    private const PLAN = [
        8 => ['n' => 2, 'limits' => ['1.0' => [0, 1], '1.5' => [0, 1], '2.5' => [0, 1], '4.0' => [0, 1]]],
        15 => ['n' => 3, 'limits' => ['1.0' => [0, 1], '1.5' => [0, 1], '2.5' => [0, 1], '4.0' => [0, 1]]],
        25 => ['n' => 5, 'limits' => ['1.0' => [0, 1], '1.5' => [0, 1], '2.5' => [0, 1], '4.0' => [0, 1]]],
        50 => ['n' => 8, 'limits' => ['1.0' => [0, 1], '1.5' => [0, 1], '2.5' => [0, 1], '4.0' => [1, 2]]],
        90 => ['n' => 13, 'limits' => ['1.0' => [0, 1], '1.5' => [0, 1], '2.5' => [1, 2], '4.0' => [1, 2]]],
        150 => ['n' => 20, 'limits' => ['1.0' => [0, 1], '1.5' => [1, 2], '2.5' => [1, 2], '4.0' => [2, 3]]],
        280 => ['n' => 32, 'limits' => ['1.0' => [1, 2], '1.5' => [1, 2], '2.5' => [2, 3], '4.0' => [3, 4]]],
        500 => ['n' => 50, 'limits' => ['1.0' => [1, 2], '1.5' => [2, 3], '2.5' => [3, 4], '4.0' => [5, 6]]],
        1200 => ['n' => 80, 'limits' => ['1.0' => [2, 3], '1.5' => [3, 4], '2.5' => [5, 6], '4.0' => [7, 8]]],
        3200 => ['n' => 125, 'limits' => ['1.0' => [3, 4], '1.5' => [5, 6], '2.5' => [7, 8], '4.0' => [10, 11]]],
        10000 => ['n' => 200, 'limits' => ['1.0' => [5, 6], '1.5' => [7, 8], '2.5' => [10, 11], '4.0' => [14, 15]]],
        35000 => ['n' => 315, 'limits' => ['1.0' => [7, 8], '1.5' => [10, 11], '2.5' => [14, 15], '4.0' => [21, 22]]],
        150000 => ['n' => 500, 'limits' => ['1.0' => [10, 11], '1.5' => [14, 15], '2.5' => [21, 22], '4.0' => [21, 22]]],
        500000 => ['n' => 800, 'limits' => ['1.0' => [14, 15], '1.5' => [21, 22], '2.5' => [21, 22], '4.0' => [21, 22]]],
    ];

    /**
     * @return array{sample_size: int, accept_point: int, reject_point: int, aql: string}
     */
    public function plan(int $lotQty, string $aql = '2.5'): array
    {
        if ($lotQty < 2) {
            throw new InvalidArgumentException('Lot quantity must be at least 2.');
        }

        $key = $this->normalizeAql($aql);
        foreach (self::PLAN as $maxLot => $row) {
            if ($lotQty <= $maxLot) {
                [$accept, $reject] = $row['limits'][$key];

                return [
                    'sample_size' => min($row['n'], $lotQty),
                    'accept_point' => $accept,
                    'reject_point' => $reject,
                    'aql' => $key,
                ];
            }
        }

        $last = self::PLAN[500000];
        [$accept, $reject] = $last['limits'][$key];

        return [
            'sample_size' => $last['n'],
            'accept_point' => $accept,
            'reject_point' => $reject,
            'aql' => $key,
        ];
    }

    public function decide(int $critical, int $major, int $acceptPoint): string
    {
        if ($critical > 0 || $major > $acceptPoint) {
            return 'fail';
        }

        return 'pass';
    }

    private function normalizeAql(string $aql): string
    {
        $normalized = number_format((float) $aql, 1, '.', '');
        if (! in_array($normalized, ['1.0', '1.5', '2.5', '4.0'], true)) {
            throw new InvalidArgumentException('AQL must be 1.0, 1.5, 2.5 or 4.0.');
        }

        return $normalized;
    }
}
