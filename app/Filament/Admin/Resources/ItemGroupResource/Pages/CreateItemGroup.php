<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ItemGroupResource\Pages;

use App\Filament\Admin\Resources\ItemGroupResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateItemGroup extends CreatesGarmentRecord
{
    protected static string $resource = ItemGroupResource::class;
}
