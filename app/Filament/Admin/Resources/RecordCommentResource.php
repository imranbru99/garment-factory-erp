<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\RecordComment;
use App\Filament\Admin\Resources\RecordCommentResource\Pages;

class RecordCommentResource extends GarmentResource
{
    protected static ?string $model = RecordComment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Communication';

    protected static ?string $moduleKey = 'communication';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRecordComment::route('/'),
            'create' => Pages\CreateRecordComment::route('/create'),
            'edit' => Pages\EditRecordComment::route('/{record}/edit'),
        ];
    }
}
