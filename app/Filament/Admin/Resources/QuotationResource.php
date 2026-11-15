<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Quotation;
use App\Filament\Admin\Resources\QuotationResource\Pages;

class QuotationResource extends GarmentResource
{
    protected static ?string $model = Quotation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Marketing';

    protected static ?string $moduleKey = 'marketing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuotation::route('/'),
            'create' => Pages\CreateQuotation::route('/create'),
            'edit' => Pages\EditQuotation::route('/{record}/edit'),
        ];
    }
}
