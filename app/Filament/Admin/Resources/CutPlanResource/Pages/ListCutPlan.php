<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CutPlanResource\Pages;

use App\Filament\Admin\Resources\CutPlanResource;
use App\Filament\Support\ListsGarmentRecords;

class ListCutPlan extends ListsGarmentRecords
{
    protected static string $resource = CutPlanResource::class;
}
