<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PayrollPeriodResource\Pages;

use App\Filament\Admin\Resources\PayrollPeriodResource;
use App\Filament\Support\ListsGarmentRecords;

class ListPayrollPeriod extends ListsGarmentRecords
{
    protected static string $resource = PayrollPeriodResource::class;
}
