<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BuyerContactResource\Pages;

use App\Filament\Admin\Resources\BuyerContactResource;
use App\Filament\Support\ListsGarmentRecords;

class ListBuyerContact extends ListsGarmentRecords
{
    protected static string $resource = BuyerContactResource::class;
}
