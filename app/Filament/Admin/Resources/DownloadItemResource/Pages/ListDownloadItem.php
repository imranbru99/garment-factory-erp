<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\DownloadItemResource\Pages;

use App\Filament\Admin\Resources\DownloadItemResource;
use App\Filament\Support\ListsGarmentRecords;

class ListDownloadItem extends ListsGarmentRecords
{
    protected static string $resource = DownloadItemResource::class;
}
