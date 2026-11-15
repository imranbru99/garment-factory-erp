<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PayrollPeriodResource\Pages;

use App\Filament\Admin\Resources\PayrollPeriodResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreatePayrollPeriod extends CreatesGarmentRecord
{
    protected static string $resource = PayrollPeriodResource::class;
}
