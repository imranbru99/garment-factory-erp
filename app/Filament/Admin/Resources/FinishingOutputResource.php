<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\FinishingOutput;
use App\Filament\Admin\Resources\FinishingOutputResource\Pages;

class FinishingOutputResource extends GarmentResource
{
    protected static ?string $model = FinishingOutput::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Finishing';

    protected static ?string $moduleKey = 'finishing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFinishingOutput::route('/'),
            'create' => Pages\CreateFinishingOutput::route('/create'),
            'edit' => Pages\EditFinishingOutput::route('/{record}/edit'),
        ];
    }
}
