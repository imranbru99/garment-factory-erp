<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\EsgRecord;
use App\Filament\Admin\Resources\EsgRecordResource\Pages;

class EsgRecordResource extends GarmentResource
{
    protected static ?string $model = EsgRecord::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Compliance';

    protected static ?string $moduleKey = 'compliance';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEsgRecord::route('/'),
            'create' => Pages\CreateEsgRecord::route('/create'),
            'edit' => Pages\EditEsgRecord::route('/{record}/edit'),
        ];
    }
}
