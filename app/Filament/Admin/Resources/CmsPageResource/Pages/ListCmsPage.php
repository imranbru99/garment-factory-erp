<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CmsPageResource\Pages;

use App\Filament\Admin\Resources\CmsPageResource;
use App\Filament\Support\ListsGarmentRecords;

class ListCmsPage extends ListsGarmentRecords
{
    protected static string $resource = CmsPageResource::class;
}
