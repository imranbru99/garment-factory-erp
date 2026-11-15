<?php

declare(strict_types=1);

namespace App\Filament\Buyer\Resources\ClaimResource\Pages;

use App\Filament\Buyer\Resources\ClaimResource;
use App\Filament\Support\ListsGarmentRecords;

class ListClaim extends ListsGarmentRecords
{
    protected static string $resource = ClaimResource::class;
}
