<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BuyerVisitResource\Pages;

use App\Filament\Admin\Resources\BuyerVisitResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateBuyerVisit extends CreatesGarmentRecord
{
    protected static string $resource = BuyerVisitResource::class;
}
