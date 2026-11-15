<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Defect;
use App\Filament\Admin\Resources\DefectResource\Pages;

class DefectResource extends GarmentResource
{
    protected static ?string $model = Defect::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Quality';

    protected static ?string $moduleKey = 'quality';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDefect::route('/'),
            'create' => Pages\CreateDefect::route('/create'),
            'edit' => Pages\EditDefect::route('/{record}/edit'),
        ];
    }
}
