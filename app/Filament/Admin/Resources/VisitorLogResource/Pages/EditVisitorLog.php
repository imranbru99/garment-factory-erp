<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\VisitorLogResource\Pages;

use App\Filament\Admin\Resources\VisitorLogResource;
use App\Filament\Support\EditsGarmentRecord;

class EditVisitorLog extends EditsGarmentRecord
{
    protected static string $resource = VisitorLogResource::class;
}
