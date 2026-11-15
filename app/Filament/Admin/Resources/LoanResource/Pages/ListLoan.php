<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LoanResource\Pages;

use App\Filament\Admin\Resources\LoanResource;
use App\Filament\Support\ListsGarmentRecords;

class ListLoan extends ListsGarmentRecords
{
    protected static string $resource = LoanResource::class;
}
