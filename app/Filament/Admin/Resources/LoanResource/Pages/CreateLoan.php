<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LoanResource\Pages;

use App\Filament\Admin\Resources\LoanResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateLoan extends CreatesGarmentRecord
{
    protected static string $resource = LoanResource::class;
}
