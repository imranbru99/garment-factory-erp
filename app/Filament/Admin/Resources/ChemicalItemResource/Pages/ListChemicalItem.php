<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ChemicalItemResource\Pages;

use App\Filament\Admin\Resources\ChemicalItemResource;
use App\Filament\Support\ListsGarmentRecords;

class ListChemicalItem extends ListsGarmentRecords
{
    protected static string $resource = ChemicalItemResource::class;
}
