<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\LetterOfCredit;
use App\Filament\Admin\Resources\LetterOfCreditResource\Pages;

class LetterOfCreditResource extends GarmentResource
{
    protected static ?string $model = LetterOfCredit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Commercial';

    protected static ?string $moduleKey = 'commercial';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLetterOfCredit::route('/'),
            'create' => Pages\CreateLetterOfCredit::route('/create'),
            'edit' => Pages\EditLetterOfCredit::route('/{record}/edit'),
        ];
    }
}
