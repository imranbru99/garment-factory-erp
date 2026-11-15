<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\EmbroideryJobResource\Pages;

use App\Filament\Admin\Resources\EmbroideryJobResource;
use App\Filament\Support\ListsGarmentRecords;

class ListEmbroideryJob extends ListsGarmentRecords
{
    protected static string $resource = EmbroideryJobResource::class;
}
