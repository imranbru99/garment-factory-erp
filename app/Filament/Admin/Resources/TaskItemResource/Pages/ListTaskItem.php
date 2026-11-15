<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\TaskItemResource\Pages;

use App\Filament\Admin\Resources\TaskItemResource;
use App\Filament\Support\ListsGarmentRecords;

class ListTaskItem extends ListsGarmentRecords
{
    protected static string $resource = TaskItemResource::class;
}
