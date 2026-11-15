<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Incoterm;
use App\Filament\Admin\Resources\IncotermResource\Pages;

class IncotermResource extends GarmentResource
{
    protected static ?string $model = Incoterm::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Commercial';

    protected static ?string $moduleKey = 'commercial';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIncoterm::route('/'),
            'create' => Pages\CreateIncoterm::route('/create'),
            'edit' => Pages\EditIncoterm::route('/{record}/edit'),
        ];
    }
}
