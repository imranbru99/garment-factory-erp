<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\PlanSlot;
use App\Filament\Admin\Resources\PlanSlotResource\Pages;

class PlanSlotResource extends GarmentResource
{
    protected static ?string $model = PlanSlot::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Planning';

    protected static ?string $moduleKey = 'planning';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPlanSlot::route('/'),
            'create' => Pages\CreatePlanSlot::route('/create'),
            'edit' => Pages\EditPlanSlot::route('/{record}/edit'),
        ];
    }
}
