<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BuyerResource\Pages;

use App\Filament\Admin\Resources\BuyerResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateBuyer extends CreatesGarmentRecord
{
    protected static string $resource = BuyerResource::class;
}
