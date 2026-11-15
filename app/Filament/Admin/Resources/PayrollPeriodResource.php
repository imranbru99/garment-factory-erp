<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\PayrollPeriod;
use App\Filament\Admin\Resources\PayrollPeriodResource\Pages;

class PayrollPeriodResource extends GarmentResource
{
    protected static ?string $model = PayrollPeriod::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Human Resources';

    protected static ?string $moduleKey = 'hr';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayrollPeriod::route('/'),
            'create' => Pages\CreatePayrollPeriod::route('/create'),
            'edit' => Pages\EditPayrollPeriod::route('/{record}/edit'),
        ];
    }
}
