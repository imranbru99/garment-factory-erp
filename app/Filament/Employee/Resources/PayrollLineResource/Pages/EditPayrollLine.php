<?php

declare(strict_types=1);

namespace App\Filament\Employee\Resources\PayrollLineResource\Pages;

use App\Filament\Employee\Resources\PayrollLineResource;
use App\Filament\Support\EditsGarmentRecord;

class EditPayrollLine extends EditsGarmentRecord
{
    protected static string $resource = PayrollLineResource::class;
}
