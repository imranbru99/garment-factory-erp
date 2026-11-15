<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\LcAmendment;
use App\Filament\Admin\Resources\LcAmendmentResource\Pages;

class LcAmendmentResource extends GarmentResource
{
    protected static ?string $model = LcAmendment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Commercial';

    protected static ?string $moduleKey = 'commercial';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLcAmendment::route('/'),
            'create' => Pages\CreateLcAmendment::route('/create'),
            'edit' => Pages\EditLcAmendment::route('/{record}/edit'),
        ];
    }
}
