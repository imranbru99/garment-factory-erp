<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ImportDocument;

class ImportDocumentPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ImportDocument::class;
    }

    protected function module(): string
    {
        return 'commercial';
    }
}
