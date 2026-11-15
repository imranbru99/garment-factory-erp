<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Inquiry;
use App\Filament\Admin\Resources\InquiryResource\Pages;

class InquiryResource extends GarmentResource
{
    protected static ?string $model = Inquiry::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Marketing';

    protected static ?string $moduleKey = 'marketing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInquiry::route('/'),
            'create' => Pages\CreateInquiry::route('/create'),
            'edit' => Pages\EditInquiry::route('/{record}/edit'),
        ];
    }
}
