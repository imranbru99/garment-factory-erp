<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\TaskItem;
use App\Filament\Admin\Resources\TaskItemResource\Pages;

class TaskItemResource extends GarmentResource
{
    protected static ?string $model = TaskItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Communication';

    protected static ?string $moduleKey = 'communication';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTaskItem::route('/'),
            'create' => Pages\CreateTaskItem::route('/create'),
            'edit' => Pages\EditTaskItem::route('/{record}/edit'),
        ];
    }
}
