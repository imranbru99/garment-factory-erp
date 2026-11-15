<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BuyerResource\Pages;

use App\Filament\Admin\Resources\BuyerResource;
use App\Filament\Support\ListsGarmentRecords;

class ListBuyer extends ListsGarmentRecords
{
    protected static string $resource = BuyerResource::class;
}
