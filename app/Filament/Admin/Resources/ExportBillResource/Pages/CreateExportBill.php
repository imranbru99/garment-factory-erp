<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ExportBillResource\Pages;

use App\Filament\Admin\Resources\ExportBillResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateExportBill extends CreatesGarmentRecord
{
    protected static string $resource = ExportBillResource::class;
}
