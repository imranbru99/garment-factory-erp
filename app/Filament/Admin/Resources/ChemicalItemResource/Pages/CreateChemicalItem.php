<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ChemicalItemResource\Pages;

use App\Filament\Admin\Resources\ChemicalItemResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateChemicalItem extends CreatesGarmentRecord
{
    protected static string $resource = ChemicalItemResource::class;
}
