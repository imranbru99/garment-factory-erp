<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\LabTest;
use App\Filament\Admin\Resources\LabTestResource\Pages;

class LabTestResource extends GarmentResource
{
    protected static ?string $model = LabTest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Laboratory';

    protected static ?string $moduleKey = 'lab';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLabTest::route('/'),
            'create' => Pages\CreateLabTest::route('/create'),
            'edit' => Pages\EditLabTest::route('/{record}/edit'),
        ];
    }
}
