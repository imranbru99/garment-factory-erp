<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\TrainingRecordResource\Pages;

use App\Filament\Admin\Resources\TrainingRecordResource;
use App\Filament\Support\EditsGarmentRecord;

class EditTrainingRecord extends EditsGarmentRecord
{
    protected static string $resource = TrainingRecordResource::class;
}
