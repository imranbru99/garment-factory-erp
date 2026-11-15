<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\EmbroideryTypeResource\Pages;

use App\Filament\Admin\Resources\EmbroideryTypeResource;
use App\Filament\Support\ListsGarmentRecords;

class ListEmbroideryType extends ListsGarmentRecords
{
    protected static string $resource = EmbroideryTypeResource::class;
}
