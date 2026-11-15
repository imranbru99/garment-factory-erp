<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\TrainingRecord;
use App\Filament\Admin\Resources\TrainingRecordResource\Pages;

class TrainingRecordResource extends GarmentResource
{
    protected static ?string $model = TrainingRecord::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Human Resources';

    protected static ?string $moduleKey = 'hr';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrainingRecord::route('/'),
            'create' => Pages\CreateTrainingRecord::route('/create'),
            'edit' => Pages\EditTrainingRecord::route('/{record}/edit'),
        ];
    }
}
