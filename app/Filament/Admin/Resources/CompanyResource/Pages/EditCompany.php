<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CompanyResource\Pages;

use App\Filament\Admin\Resources\CompanyResource;
use App\Filament\Support\EditsGarmentRecord;

class EditCompany extends EditsGarmentRecord
{
    protected static string $resource = CompanyResource::class;
}
