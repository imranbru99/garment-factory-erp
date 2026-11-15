<?php

declare(strict_types=1);

namespace App\Filament\Floor\Resources\BundleResource\Pages;

use App\Filament\Floor\Resources\BundleResource;
use App\Filament\Support\EditsGarmentRecord;

class EditBundle extends EditsGarmentRecord
{
    protected static string $resource = BundleResource::class;
}
