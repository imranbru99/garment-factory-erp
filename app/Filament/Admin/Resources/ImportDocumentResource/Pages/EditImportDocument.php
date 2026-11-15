<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ImportDocumentResource\Pages;

use App\Filament\Admin\Resources\ImportDocumentResource;
use App\Filament\Support\EditsGarmentRecord;

class EditImportDocument extends EditsGarmentRecord
{
    protected static string $resource = ImportDocumentResource::class;
}
