<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PlanSlotResource\Pages;

use App\Filament\Admin\Resources\PlanSlotResource;
use App\Filament\Support\EditsGarmentRecord;

class EditPlanSlot extends EditsGarmentRecord
{
    protected static string $resource = PlanSlotResource::class;
}
