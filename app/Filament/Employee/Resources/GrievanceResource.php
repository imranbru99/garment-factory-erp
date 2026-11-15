<?php

declare(strict_types=1);

namespace App\Filament\Employee\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Grievance;
use App\Filament\Employee\Resources\GrievanceResource\Pages;

class GrievanceResource extends GarmentResource
{
    protected static ?string $model = Grievance::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Human Resources';

    protected static ?string $moduleKey = 'hr';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGrievance::route('/'),
            'create' => Pages\CreateGrievance::route('/create'),
            'edit' => Pages\EditGrievance::route('/{record}/edit'),
        ];
    }
}
