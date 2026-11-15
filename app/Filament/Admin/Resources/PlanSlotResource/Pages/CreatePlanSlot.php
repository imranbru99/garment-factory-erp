<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PlanSlotResource\Pages;

use App\Filament\Admin\Resources\PlanSlotResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreatePlanSlot extends CreatesGarmentRecord
{
    protected static string $resource = PlanSlotResource::class;
}
