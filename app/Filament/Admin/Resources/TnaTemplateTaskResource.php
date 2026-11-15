<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\TnaTemplateTask;
use App\Filament\Admin\Resources\TnaTemplateTaskResource\Pages;

class TnaTemplateTaskResource extends GarmentResource
{
    protected static ?string $model = TnaTemplateTask::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Orders';

    protected static ?string $moduleKey = 'orders';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTnaTemplateTask::route('/'),
            'create' => Pages\CreateTnaTemplateTask::route('/create'),
            'edit' => Pages\EditTnaTemplateTask::route('/{record}/edit'),
        ];
    }
}
