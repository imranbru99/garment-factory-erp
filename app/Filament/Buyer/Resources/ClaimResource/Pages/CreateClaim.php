<?php

declare(strict_types=1);

namespace App\Filament\Buyer\Resources\ClaimResource\Pages;

use App\Filament\Buyer\Resources\ClaimResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateClaim extends CreatesGarmentRecord
{
    protected static string $resource = ClaimResource::class;
}
