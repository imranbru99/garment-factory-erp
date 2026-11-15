<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\TnaMilestone;
use App\Filament\Admin\Resources\TnaMilestoneResource\Pages;

class TnaMilestoneResource extends GarmentResource
{
    protected static ?string $model = TnaMilestone::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Orders';

    protected static ?string $moduleKey = 'orders';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTnaMilestone::route('/'),
            'create' => Pages\CreateTnaMilestone::route('/create'),
            'edit' => Pages\EditTnaMilestone::route('/{record}/edit'),
        ];
    }
}
