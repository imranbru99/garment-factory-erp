<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\EsgRecordResource\Pages;

use App\Filament\Admin\Resources\EsgRecordResource;
use App\Filament\Support\ListsGarmentRecords;

class ListEsgRecord extends ListsGarmentRecords
{
    protected static string $resource = EsgRecordResource::class;
}
