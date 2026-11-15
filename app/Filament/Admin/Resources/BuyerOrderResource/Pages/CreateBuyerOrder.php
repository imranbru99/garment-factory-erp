<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BuyerOrderResource\Pages;

use App\Filament\Admin\Resources\BuyerOrderResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateBuyerOrder extends CreatesGarmentRecord
{
    protected static string $resource = BuyerOrderResource::class;
}
