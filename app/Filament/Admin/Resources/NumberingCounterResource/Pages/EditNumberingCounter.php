<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\NumberingCounterResource\Pages;

use App\Filament\Admin\Resources\NumberingCounterResource;
use App\Filament\Support\EditsGarmentRecord;

class EditNumberingCounter extends EditsGarmentRecord
{
    protected static string $resource = NumberingCounterResource::class;
}
