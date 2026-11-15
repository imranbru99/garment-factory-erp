<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BuyerVisitResource\Pages;

use App\Filament\Admin\Resources\BuyerVisitResource;
use App\Filament\Support\ListsGarmentRecords;

class ListBuyerVisit extends ListsGarmentRecords
{
    protected static string $resource = BuyerVisitResource::class;
}
