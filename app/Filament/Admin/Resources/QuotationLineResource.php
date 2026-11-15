<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\QuotationLine;
use App\Filament\Admin\Resources\QuotationLineResource\Pages;

class QuotationLineResource extends GarmentResource
{
    protected static ?string $model = QuotationLine::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Marketing';

    protected static ?string $moduleKey = 'marketing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuotationLine::route('/'),
            'create' => Pages\CreateQuotationLine::route('/create'),
            'edit' => Pages\EditQuotationLine::route('/{record}/edit'),
        ];
    }
}
