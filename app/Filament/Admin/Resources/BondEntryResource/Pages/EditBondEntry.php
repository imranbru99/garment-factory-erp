<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BondEntryResource\Pages;

use App\Filament\Admin\Resources\BondEntryResource;
use App\Filament\Support\EditsGarmentRecord;

class EditBondEntry extends EditsGarmentRecord
{
    protected static string $resource = BondEntryResource::class;
}
