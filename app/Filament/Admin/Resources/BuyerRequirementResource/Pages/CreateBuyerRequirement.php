<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BuyerRequirementResource\Pages;

use App\Filament\Admin\Resources\BuyerRequirementResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateBuyerRequirement extends CreatesGarmentRecord
{
    protected static string $resource = BuyerRequirementResource::class;
}
