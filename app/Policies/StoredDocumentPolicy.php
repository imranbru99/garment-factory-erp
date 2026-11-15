<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\StoredDocument;

class StoredDocumentPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return StoredDocument::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
