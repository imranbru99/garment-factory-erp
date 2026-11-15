<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\QcDefect;
use App\Filament\Admin\Resources\QcDefectResource\Pages;

class QcDefectResource extends GarmentResource
{
    protected static ?string $model = QcDefect::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Quality';

    protected static ?string $moduleKey = 'quality';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQcDefect::route('/'),
            'create' => Pages\CreateQcDefect::route('/create'),
            'edit' => Pages\EditQcDefect::route('/{record}/edit'),
        ];
    }
}
