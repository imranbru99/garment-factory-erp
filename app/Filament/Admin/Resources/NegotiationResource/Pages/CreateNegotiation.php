<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\NegotiationResource\Pages;

use App\Filament\Admin\Resources\NegotiationResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateNegotiation extends CreatesGarmentRecord
{
    protected static string $resource = NegotiationResource::class;
}
