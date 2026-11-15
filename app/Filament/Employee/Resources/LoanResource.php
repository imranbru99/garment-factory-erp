<?php

declare(strict_types=1);

namespace App\Filament\Employee\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Loan;
use App\Filament\Employee\Resources\LoanResource\Pages;

class LoanResource extends GarmentResource
{
    protected static ?string $model = Loan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Human Resources';

    protected static ?string $moduleKey = 'hr';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLoan::route('/'),
            'create' => Pages\CreateLoan::route('/create'),
            'edit' => Pages\EditLoan::route('/{record}/edit'),
        ];
    }
}
