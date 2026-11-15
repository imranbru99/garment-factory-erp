<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\RequisitionLine;
use App\Filament\Admin\Resources\RequisitionLineResource\Pages;

class RequisitionLineResource extends GarmentResource
{
    protected static ?string $model = RequisitionLine::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Procurement';

    protected static ?string $moduleKey = 'procurement';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRequisitionLine::route('/'),
            'create' => Pages\CreateRequisitionLine::route('/create'),
            'edit' => Pages\EditRequisitionLine::route('/{record}/edit'),
        ];
    }
}
