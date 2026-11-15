<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\TaskItemResource\Pages;

use App\Filament\Admin\Resources\TaskItemResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateTaskItem extends CreatesGarmentRecord
{
    protected static string $resource = TaskItemResource::class;
}
