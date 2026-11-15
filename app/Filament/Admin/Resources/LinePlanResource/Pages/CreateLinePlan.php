<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LinePlanResource\Pages;

use App\Filament\Admin\Resources\LinePlanResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateLinePlan extends CreatesGarmentRecord
{
    protected static string $resource = LinePlanResource::class;
}
