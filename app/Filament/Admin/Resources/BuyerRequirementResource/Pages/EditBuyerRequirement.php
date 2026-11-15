<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BuyerRequirementResource\Pages;

use App\Filament\Admin\Resources\BuyerRequirementResource;
use App\Filament\Support\EditsGarmentRecord;

class EditBuyerRequirement extends EditsGarmentRecord
{
    protected static string $resource = BuyerRequirementResource::class;
}
