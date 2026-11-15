<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SizeResource\Pages;

use App\Filament\Admin\Resources\SizeResource;
use App\Filament\Support\ListsGarmentRecords;

class ListSize extends ListsGarmentRecords
{
    protected static string $resource = SizeResource::class;
}
