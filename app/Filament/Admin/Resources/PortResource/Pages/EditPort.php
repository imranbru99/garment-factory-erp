<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PortResource\Pages;

use App\Filament\Admin\Resources\PortResource;
use App\Filament\Support\EditsGarmentRecord;

class EditPort extends EditsGarmentRecord
{
    protected static string $resource = PortResource::class;
}
