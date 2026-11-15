<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PayrollLineResource\Pages;

use App\Filament\Admin\Resources\PayrollLineResource;
use App\Filament\Support\ListsGarmentRecords;

class ListPayrollLine extends ListsGarmentRecords
{
    protected static string $resource = PayrollLineResource::class;
}
