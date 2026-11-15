<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\TrainingRecordResource\Pages;

use App\Filament\Admin\Resources\TrainingRecordResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateTrainingRecord extends CreatesGarmentRecord
{
    protected static string $resource = TrainingRecordResource::class;
}
