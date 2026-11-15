<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\NumberingCounter;
use App\Filament\Admin\Resources\NumberingCounterResource\Pages;

class NumberingCounterResource extends GarmentResource
{
    protected static ?string $model = NumberingCounter::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $moduleKey = 'foundation';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNumberingCounter::route('/'),
            'create' => Pages\CreateNumberingCounter::route('/create'),
            'edit' => Pages\EditNumberingCounter::route('/{record}/edit'),
        ];
    }
}
