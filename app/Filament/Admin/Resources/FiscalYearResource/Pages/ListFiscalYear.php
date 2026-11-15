<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\FiscalYearResource\Pages;

use App\Filament\Admin\Resources\FiscalYearResource;
use App\Filament\Support\ListsGarmentRecords;

class ListFiscalYear extends ListsGarmentRecords
{
    protected static string $resource = FiscalYearResource::class;
}
