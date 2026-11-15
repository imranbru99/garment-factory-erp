<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\LinePlan;
use App\Filament\Admin\Resources\LinePlanResource\Pages;

class LinePlanResource extends GarmentResource
{
    protected static ?string $model = LinePlan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Planning';

    protected static ?string $moduleKey = 'planning';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLinePlan::route('/'),
            'create' => Pages\CreateLinePlan::route('/create'),
            'edit' => Pages\EditLinePlan::route('/{record}/edit'),
        ];
    }
}
