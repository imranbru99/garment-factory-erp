<?php

declare(strict_types=1);

namespace App\Filament\Employee\Resources\LoanResource\Pages;

use App\Filament\Employee\Resources\LoanResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateLoan extends CreatesGarmentRecord
{
    protected static string $resource = LoanResource::class;
}
