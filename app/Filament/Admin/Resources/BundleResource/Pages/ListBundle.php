<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BundleResource\Pages;

use App\Filament\Admin\Resources\BundleResource;
use App\Filament\Support\ListsGarmentRecords;

class ListBundle extends ListsGarmentRecords
{
    protected static string $resource = BundleResource::class;
}
