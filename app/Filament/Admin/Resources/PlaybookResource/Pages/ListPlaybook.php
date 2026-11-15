<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PlaybookResource\Pages;

use App\Filament\Admin\Resources\PlaybookResource;
use App\Filament\Support\ListsGarmentRecords;

class ListPlaybook extends ListsGarmentRecords
{
    protected static string $resource = PlaybookResource::class;
}
