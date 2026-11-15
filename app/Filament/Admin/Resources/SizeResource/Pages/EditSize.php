<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SizeResource\Pages;

use App\Filament\Admin\Resources\SizeResource;
use App\Filament\Support\EditsGarmentRecord;

class EditSize extends EditsGarmentRecord
{
    protected static string $resource = SizeResource::class;
}
