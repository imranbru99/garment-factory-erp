<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\TaskItemResource\Pages;

use App\Filament\Admin\Resources\TaskItemResource;
use App\Filament\Support\EditsGarmentRecord;

class EditTaskItem extends EditsGarmentRecord
{
    protected static string $resource = TaskItemResource::class;
}
