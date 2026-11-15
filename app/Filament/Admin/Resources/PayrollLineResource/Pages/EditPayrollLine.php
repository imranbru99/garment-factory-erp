<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PayrollLineResource\Pages;

use App\Filament\Admin\Resources\PayrollLineResource;
use App\Filament\Support\EditsGarmentRecord;

class EditPayrollLine extends EditsGarmentRecord
{
    protected static string $resource = PayrollLineResource::class;
}
