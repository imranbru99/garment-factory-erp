<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\WashBatchResource\Pages;

use App\Filament\Admin\Resources\WashBatchResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateWashBatch extends CreatesGarmentRecord
{
    protected static string $resource = WashBatchResource::class;
}
