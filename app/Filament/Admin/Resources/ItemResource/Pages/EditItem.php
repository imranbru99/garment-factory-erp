<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ItemResource\Pages;

use App\Filament\Admin\Resources\ItemResource;
use App\Filament\Support\EditsGarmentRecord;

class EditItem extends EditsGarmentRecord
{
    protected static string $resource = ItemResource::class;
}
