<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BomLineResource\Pages;

use App\Filament\Admin\Resources\BomLineResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateBomLine extends CreatesGarmentRecord
{
    protected static string $resource = BomLineResource::class;
}
