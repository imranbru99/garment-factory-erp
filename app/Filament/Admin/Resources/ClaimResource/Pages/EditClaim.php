<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ClaimResource\Pages;

use App\Filament\Admin\Resources\ClaimResource;
use App\Filament\Support\EditsGarmentRecord;

class EditClaim extends EditsGarmentRecord
{
    protected static string $resource = ClaimResource::class;
}
