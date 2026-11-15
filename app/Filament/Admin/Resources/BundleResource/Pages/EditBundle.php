<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BundleResource\Pages;

use App\Filament\Admin\Resources\BundleResource;
use App\Filament\Support\EditsGarmentRecord;

class EditBundle extends EditsGarmentRecord
{
    protected static string $resource = BundleResource::class;
}
