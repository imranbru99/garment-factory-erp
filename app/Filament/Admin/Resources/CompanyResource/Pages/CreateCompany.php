<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CompanyResource\Pages;

use App\Filament\Admin\Resources\CompanyResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateCompany extends CreatesGarmentRecord
{
    protected static string $resource = CompanyResource::class;
}
