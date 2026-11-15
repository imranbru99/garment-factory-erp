<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\DownloadItemResource\Pages;

use App\Filament\Admin\Resources\DownloadItemResource;
use App\Filament\Support\EditsGarmentRecord;

class EditDownloadItem extends EditsGarmentRecord
{
    protected static string $resource = DownloadItemResource::class;
}
