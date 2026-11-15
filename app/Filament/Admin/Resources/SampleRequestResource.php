<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\SampleRequest;
use App\Filament\Admin\Resources\SampleRequestResource\Pages;

class SampleRequestResource extends GarmentResource
{
    protected static ?string $model = SampleRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Sampling';

    protected static ?string $moduleKey = 'sampling';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSampleRequest::route('/'),
            'create' => Pages\CreateSampleRequest::route('/create'),
            'edit' => Pages\EditSampleRequest::route('/{record}/edit'),
        ];
    }
}
