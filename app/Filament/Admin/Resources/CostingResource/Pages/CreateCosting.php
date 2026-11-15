<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CostingResource\Pages;

use App\Filament\Admin\Resources\CostingResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateCosting extends CreatesGarmentRecord
{
    protected static string $resource = CostingResource::class;
}
