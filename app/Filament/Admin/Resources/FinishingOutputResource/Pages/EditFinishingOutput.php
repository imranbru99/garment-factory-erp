<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\FinishingOutputResource\Pages;

use App\Filament\Admin\Resources\FinishingOutputResource;
use App\Filament\Support\EditsGarmentRecord;

class EditFinishingOutput extends EditsGarmentRecord
{
    protected static string $resource = FinishingOutputResource::class;
}
