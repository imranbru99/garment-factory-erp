<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\GoodsReceiptLine;
use App\Filament\Admin\Resources\GoodsReceiptLineResource\Pages;

class GoodsReceiptLineResource extends GarmentResource
{
    protected static ?string $model = GoodsReceiptLine::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Procurement';

    protected static ?string $moduleKey = 'procurement';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGoodsReceiptLine::route('/'),
            'create' => Pages\CreateGoodsReceiptLine::route('/create'),
            'edit' => Pages\EditGoodsReceiptLine::route('/{record}/edit'),
        ];
    }
}
