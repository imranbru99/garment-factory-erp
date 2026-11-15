<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\FixedAssetResource\Pages;

use App\Filament\Admin\Resources\FixedAssetResource;
use App\Filament\Support\EditsGarmentRecord;

class EditFixedAsset extends EditsGarmentRecord
{
    protected static string $resource = FixedAssetResource::class;
}
