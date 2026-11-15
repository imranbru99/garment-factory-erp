<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\NeedleLog;
use App\Filament\Admin\Resources\NeedleLogResource\Pages;

class NeedleLogResource extends GarmentResource
{
    protected static ?string $model = NeedleLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Quality';

    protected static ?string $moduleKey = 'quality';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNeedleLog::route('/'),
            'create' => Pages\CreateNeedleLog::route('/create'),
            'edit' => Pages\EditNeedleLog::route('/{record}/edit'),
        ];
    }
}
