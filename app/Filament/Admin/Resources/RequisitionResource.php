<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Requisition;
use App\Filament\Admin\Resources\RequisitionResource\Pages;

class RequisitionResource extends GarmentResource
{
    protected static ?string $model = Requisition::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Procurement';

    protected static ?string $moduleKey = 'procurement';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRequisition::route('/'),
            'create' => Pages\CreateRequisition::route('/create'),
            'edit' => Pages\EditRequisition::route('/{record}/edit'),
        ];
    }
}
