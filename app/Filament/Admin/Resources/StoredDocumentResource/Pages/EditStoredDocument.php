<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\StoredDocumentResource\Pages;

use App\Filament\Admin\Resources\StoredDocumentResource;
use App\Filament\Support\EditsGarmentRecord;

class EditStoredDocument extends EditsGarmentRecord
{
    protected static string $resource = StoredDocumentResource::class;
}
