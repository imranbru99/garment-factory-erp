<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\SampleComment;
use App\Filament\Admin\Resources\SampleCommentResource\Pages;

class SampleCommentResource extends GarmentResource
{
    protected static ?string $model = SampleComment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Sampling';

    protected static ?string $moduleKey = 'sampling';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSampleComment::route('/'),
            'create' => Pages\CreateSampleComment::route('/create'),
            'edit' => Pages\EditSampleComment::route('/{record}/edit'),
        ];
    }
}
