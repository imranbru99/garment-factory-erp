<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CostingLineResource\Pages;

use App\Filament\Admin\Resources\CostingLineResource;
use App\Filament\Support\EditsGarmentRecord;

class EditCostingLine extends EditsGarmentRecord
{
    protected static string $resource = CostingLineResource::class;
}
