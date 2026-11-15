<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\TnaMilestoneResource\Pages;

use App\Filament\Admin\Resources\TnaMilestoneResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateTnaMilestone extends CreatesGarmentRecord
{
    protected static string $resource = TnaMilestoneResource::class;
}
