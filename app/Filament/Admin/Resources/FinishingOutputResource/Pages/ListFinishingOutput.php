<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\FinishingOutputResource\Pages;

use App\Filament\Admin\Resources\FinishingOutputResource;
use App\Filament\Support\ListsGarmentRecords;

class ListFinishingOutput extends ListsGarmentRecords
{
    protected static string $resource = FinishingOutputResource::class;
}
