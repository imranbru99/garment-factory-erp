<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\StoredDocumentResource\Pages;

use App\Filament\Admin\Resources\StoredDocumentResource;
use App\Filament\Support\ListsGarmentRecords;

class ListStoredDocument extends ListsGarmentRecords
{
    protected static string $resource = StoredDocumentResource::class;
}
