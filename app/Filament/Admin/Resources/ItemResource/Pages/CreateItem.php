<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ItemResource\Pages;

use App\Filament\Admin\Resources\ItemResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateItem extends CreatesGarmentRecord
{
    protected static string $resource = ItemResource::class;
}
