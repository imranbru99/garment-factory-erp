<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LibraryOperationResource\Pages;

use App\Filament\Admin\Resources\LibraryOperationResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateLibraryOperation extends CreatesGarmentRecord
{
    protected static string $resource = LibraryOperationResource::class;
}
