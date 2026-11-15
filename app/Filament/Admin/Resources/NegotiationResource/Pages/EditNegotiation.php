<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\NegotiationResource\Pages;

use App\Filament\Admin\Resources\NegotiationResource;
use App\Filament\Support\EditsGarmentRecord;

class EditNegotiation extends EditsGarmentRecord
{
    protected static string $resource = NegotiationResource::class;
}
