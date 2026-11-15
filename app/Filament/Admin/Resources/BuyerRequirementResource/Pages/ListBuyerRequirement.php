<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BuyerRequirementResource\Pages;

use App\Filament\Admin\Resources\BuyerRequirementResource;
use App\Filament\Support\ListsGarmentRecords;

class ListBuyerRequirement extends ListsGarmentRecords
{
    protected static string $resource = BuyerRequirementResource::class;
}
