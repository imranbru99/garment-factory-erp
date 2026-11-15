<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\IncentiveClaimResource\Pages;

use App\Filament\Admin\Resources\IncentiveClaimResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateIncentiveClaim extends CreatesGarmentRecord
{
    protected static string $resource = IncentiveClaimResource::class;
}
