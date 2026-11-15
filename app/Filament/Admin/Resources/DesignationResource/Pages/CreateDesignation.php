<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\DesignationResource\Pages;

use App\Filament\Admin\Resources\DesignationResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateDesignation extends CreatesGarmentRecord
{
    protected static string $resource = DesignationResource::class;
}
