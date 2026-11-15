<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CompanyResource\Pages;

use App\Filament\Admin\Resources\CompanyResource;
use App\Filament\Support\ListsGarmentRecords;

class ListCompany extends ListsGarmentRecords
{
    protected static string $resource = CompanyResource::class;
}
