<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\LineSetup;
use App\Filament\Admin\Resources\LineSetupResource\Pages;

class LineSetupResource extends GarmentResource
{
    protected static ?string $model = LineSetup::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Sewing';

    protected static ?string $moduleKey = 'sewing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLineSetup::route('/'),
            'create' => Pages\CreateLineSetup::route('/create'),
            'edit' => Pages\EditLineSetup::route('/{record}/edit'),
        ];
    }
}
