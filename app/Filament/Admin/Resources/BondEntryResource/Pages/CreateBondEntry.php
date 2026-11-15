<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BondEntryResource\Pages;

use App\Filament\Admin\Resources\BondEntryResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateBondEntry extends CreatesGarmentRecord
{
    protected static string $resource = BondEntryResource::class;
}
