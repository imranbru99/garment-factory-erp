<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\VisitorLog;
use App\Filament\Admin\Resources\VisitorLogResource\Pages;

class VisitorLogResource extends GarmentResource
{
    protected static ?string $model = VisitorLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Shipping';

    protected static ?string $moduleKey = 'shipping';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisitorLog::route('/'),
            'create' => Pages\CreateVisitorLog::route('/create'),
            'edit' => Pages\EditVisitorLog::route('/{record}/edit'),
        ];
    }
}
