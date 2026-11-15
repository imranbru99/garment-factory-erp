<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BuyingHouseResource\Pages;

use App\Filament\Admin\Resources\BuyingHouseResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateBuyingHouse extends CreatesGarmentRecord
{
    protected static string $resource = BuyingHouseResource::class;
}
