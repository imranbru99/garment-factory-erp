<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ItemGroupResource\Pages;

use App\Filament\Admin\Resources\ItemGroupResource;
use App\Filament\Support\EditsGarmentRecord;

class EditItemGroup extends EditsGarmentRecord
{
    protected static string $resource = ItemGroupResource::class;
}
