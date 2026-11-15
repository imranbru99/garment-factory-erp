<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\ChemicalItem;
use App\Filament\Admin\Resources\ChemicalItemResource\Pages;

class ChemicalItemResource extends GarmentResource
{
    protected static ?string $model = ChemicalItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Compliance';

    protected static ?string $moduleKey = 'compliance';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChemicalItem::route('/'),
            'create' => Pages\CreateChemicalItem::route('/create'),
            'edit' => Pages\EditChemicalItem::route('/{record}/edit'),
        ];
    }
}
