<?php

declare(strict_types=1);

namespace App\Filament\Employee\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\PayrollLine;
use App\Filament\Employee\Resources\PayrollLineResource\Pages;

class PayrollLineResource extends GarmentResource
{
    protected static ?string $model = PayrollLine::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Human Resources';

    protected static ?string $moduleKey = 'hr';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayrollLine::route('/'),
            'create' => Pages\CreatePayrollLine::route('/create'),
            'edit' => Pages\EditPayrollLine::route('/{record}/edit'),
        ];
    }
}
