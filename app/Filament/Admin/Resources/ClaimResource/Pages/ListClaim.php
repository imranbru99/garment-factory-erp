<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ClaimResource\Pages;

use App\Filament\Admin\Resources\ClaimResource;
use App\Filament\Support\ListsGarmentRecords;

class ListClaim extends ListsGarmentRecords
{
    protected static string $resource = ClaimResource::class;
}
