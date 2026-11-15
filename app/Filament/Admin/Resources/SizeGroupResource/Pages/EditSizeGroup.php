<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SizeGroupResource\Pages;

use App\Filament\Admin\Resources\SizeGroupResource;
use App\Filament\Support\EditsGarmentRecord;

class EditSizeGroup extends EditsGarmentRecord
{
    protected static string $resource = SizeGroupResource::class;
}
