<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\OperationBulletin;
use App\Filament\Admin\Resources\OperationBulletinResource\Pages;

class OperationBulletinResource extends GarmentResource
{
    protected static ?string $model = OperationBulletin::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Sewing';

    protected static ?string $moduleKey = 'sewing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOperationBulletin::route('/'),
            'create' => Pages\CreateOperationBulletin::route('/create'),
            'edit' => Pages\EditOperationBulletin::route('/{record}/edit'),
        ];
    }
}
