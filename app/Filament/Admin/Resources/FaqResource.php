<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Faq;
use App\Filament\Admin\Resources\FaqResource\Pages;

class FaqResource extends GarmentResource
{
    protected static ?string $model = Faq::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Website';

    protected static ?string $moduleKey = 'website';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaq::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
