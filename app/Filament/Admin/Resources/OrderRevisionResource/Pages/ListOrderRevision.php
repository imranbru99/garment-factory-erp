<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\OrderRevisionResource\Pages;

use App\Filament\Admin\Resources\OrderRevisionResource;
use App\Filament\Support\ListsGarmentRecords;

class ListOrderRevision extends ListsGarmentRecords
{
    protected static string $resource = OrderRevisionResource::class;
}
