<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\DownloadItem;

class DownloadItemPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return DownloadItem::class;
    }

    protected function module(): string
    {
        return 'website';
    }
}
