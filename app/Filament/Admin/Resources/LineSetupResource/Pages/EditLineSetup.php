<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LineSetupResource\Pages;

use App\Filament\Admin\Resources\LineSetupResource;
use App\Filament\Support\EditsGarmentRecord;

class EditLineSetup extends EditsGarmentRecord
{
    protected static string $resource = LineSetupResource::class;
}
