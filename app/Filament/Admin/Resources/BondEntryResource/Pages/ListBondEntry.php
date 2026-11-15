<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BondEntryResource\Pages;

use App\Filament\Admin\Resources\BondEntryResource;
use App\Filament\Support\ListsGarmentRecords;

class ListBondEntry extends ListsGarmentRecords
{
    protected static string $resource = BondEntryResource::class;
}
