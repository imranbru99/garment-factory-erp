<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ClaimResource\Pages;

use App\Filament\Admin\Resources\ClaimResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateClaim extends CreatesGarmentRecord
{
    protected static string $resource = ClaimResource::class;
}
