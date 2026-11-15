<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\LabDip;
use App\Filament\Admin\Resources\LabDipResource\Pages;

class LabDipResource extends GarmentResource
{
    protected static ?string $model = LabDip::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Sampling';

    protected static ?string $moduleKey = 'sampling';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLabDip::route('/'),
            'create' => Pages\CreateLabDip::route('/create'),
            'edit' => Pages\EditLabDip::route('/{record}/edit'),
        ];
    }
}
