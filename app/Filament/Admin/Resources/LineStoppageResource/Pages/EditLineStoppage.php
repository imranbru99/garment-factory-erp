<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LineStoppageResource\Pages;

use App\Filament\Admin\Resources\LineStoppageResource;
use App\Filament\Support\EditsGarmentRecord;

class EditLineStoppage extends EditsGarmentRecord
{
    protected static string $resource = LineStoppageResource::class;
}
