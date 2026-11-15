<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BundleScanResource\Pages;

use App\Filament\Admin\Resources\BundleScanResource;
use App\Filament\Support\EditsGarmentRecord;

class EditBundleScan extends EditsGarmentRecord
{
    protected static string $resource = BundleScanResource::class;
}
