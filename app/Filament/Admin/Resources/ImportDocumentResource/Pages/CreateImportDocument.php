<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ImportDocumentResource\Pages;

use App\Filament\Admin\Resources\ImportDocumentResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateImportDocument extends CreatesGarmentRecord
{
    protected static string $resource = ImportDocumentResource::class;
}
