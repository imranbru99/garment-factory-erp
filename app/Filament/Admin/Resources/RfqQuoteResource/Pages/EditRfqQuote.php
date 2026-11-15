<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\RfqQuoteResource\Pages;

use App\Filament\Admin\Resources\RfqQuoteResource;
use App\Filament\Support\EditsGarmentRecord;

class EditRfqQuote extends EditsGarmentRecord
{
    protected static string $resource = RfqQuoteResource::class;
}
