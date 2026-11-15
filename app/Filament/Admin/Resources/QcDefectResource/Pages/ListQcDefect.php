<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\QcDefectResource\Pages;

use App\Filament\Admin\Resources\QcDefectResource;
use App\Filament\Support\ListsGarmentRecords;

class ListQcDefect extends ListsGarmentRecords
{
    protected static string $resource = QcDefectResource::class;
}
