<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\QuotationLineResource\Pages;

use App\Filament\Admin\Resources\QuotationLineResource;
use App\Filament\Support\EditsGarmentRecord;

class EditQuotationLine extends EditsGarmentRecord
{
    protected static string $resource = QuotationLineResource::class;
}
