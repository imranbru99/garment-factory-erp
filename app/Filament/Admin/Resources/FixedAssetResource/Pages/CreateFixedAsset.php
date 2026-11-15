<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\FixedAssetResource\Pages;

use App\Filament\Admin\Resources\FixedAssetResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateFixedAsset extends CreatesGarmentRecord
{
    protected static string $resource = FixedAssetResource::class;
}
