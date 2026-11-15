<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\CmsPage;
use App\Filament\Admin\Resources\CmsPageResource\Pages;

class CmsPageResource extends GarmentResource
{
    protected static ?string $model = CmsPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Website';

    protected static ?string $moduleKey = 'website';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCmsPage::route('/'),
            'create' => Pages\CreateCmsPage::route('/create'),
            'edit' => Pages\EditCmsPage::route('/{record}/edit'),
        ];
    }
}
