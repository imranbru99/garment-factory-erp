<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LibraryOperationResource\Pages;

use App\Filament\Admin\Resources\LibraryOperationResource;
use App\Filament\Support\EditsGarmentRecord;

class EditLibraryOperation extends EditsGarmentRecord
{
    protected static string $resource = LibraryOperationResource::class;
}
