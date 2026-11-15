<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CutPlanResource\Pages;

use App\Filament\Admin\Resources\CutPlanResource;
use App\Filament\Support\EditsGarmentRecord;

class EditCutPlan extends EditsGarmentRecord
{
    protected static string $resource = CutPlanResource::class;
}
