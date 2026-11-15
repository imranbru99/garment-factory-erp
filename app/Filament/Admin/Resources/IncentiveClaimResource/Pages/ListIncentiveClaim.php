<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\IncentiveClaimResource\Pages;

use App\Filament\Admin\Resources\IncentiveClaimResource;
use App\Filament\Support\ListsGarmentRecords;

class ListIncentiveClaim extends ListsGarmentRecords
{
    protected static string $resource = IncentiveClaimResource::class;
}
