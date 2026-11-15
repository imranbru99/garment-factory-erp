<?php

declare(strict_types=1);

namespace App\Services\Accounts;

class ProfitService
{
    public function orderProfitMinor(int $revenueMinor, int $costMinor): int
    {
        return $revenueMinor - $costMinor;
    }
}
