<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ArReceiptResource\Pages;

use App\Filament\Admin\Resources\ArReceiptResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateArReceipt extends CreatesGarmentRecord
{
    protected static string $resource = ArReceiptResource::class;
}
