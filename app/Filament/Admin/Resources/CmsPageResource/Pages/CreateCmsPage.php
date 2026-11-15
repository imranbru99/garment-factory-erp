<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CmsPageResource\Pages;

use App\Filament\Admin\Resources\CmsPageResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateCmsPage extends CreatesGarmentRecord
{
    protected static string $resource = CmsPageResource::class;
}
