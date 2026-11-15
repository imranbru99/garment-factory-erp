<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\CutPlan;
use App\Filament\Admin\Resources\CutPlanResource\Pages;

class CutPlanResource extends GarmentResource
{
    protected static ?string $model = CutPlan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Cutting';

    protected static ?string $moduleKey = 'cutting';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCutPlan::route('/'),
            'create' => Pages\CreateCutPlan::route('/create'),
            'edit' => Pages\EditCutPlan::route('/{record}/edit'),
        ];
    }
}
