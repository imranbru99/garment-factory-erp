<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\ContactMessage;
use App\Filament\Admin\Resources\ContactMessageResource\Pages;

class ContactMessageResource extends GarmentResource
{
    protected static ?string $model = ContactMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Website';

    protected static ?string $moduleKey = 'website';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessage::route('/'),
            'create' => Pages\CreateContactMessage::route('/create'),
            'edit' => Pages\EditContactMessage::route('/{record}/edit'),
        ];
    }
}
