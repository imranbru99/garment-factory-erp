<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Applicant;
use App\Filament\Admin\Resources\ApplicantResource\Pages;

class ApplicantResource extends GarmentResource
{
    protected static ?string $model = Applicant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Human Resources';

    protected static ?string $moduleKey = 'hr';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApplicant::route('/'),
            'create' => Pages\CreateApplicant::route('/create'),
            'edit' => Pages\EditApplicant::route('/{record}/edit'),
        ];
    }
}
