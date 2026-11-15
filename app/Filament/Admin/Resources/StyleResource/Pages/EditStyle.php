<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\StyleResource\Pages;

use App\Filament\Admin\Resources\StyleResource;
use App\Filament\Support\EditsGarmentRecord;

class EditStyle extends EditsGarmentRecord
{
    protected static string $resource = StyleResource::class;
}
