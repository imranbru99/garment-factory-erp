<?php

declare(strict_types=1);

namespace App\Filament\Floor\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\LineStoppage;
use App\Filament\Floor\Resources\LineStoppageResource\Pages;

class LineStoppageResource extends GarmentResource
{
    protected static ?string $model = LineStoppage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Sewing';

    protected static ?string $moduleKey = 'sewing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLineStoppage::route('/'),
            'create' => Pages\CreateLineStoppage::route('/create'),
            'edit' => Pages\EditLineStoppage::route('/{record}/edit'),
        ];
    }
}
