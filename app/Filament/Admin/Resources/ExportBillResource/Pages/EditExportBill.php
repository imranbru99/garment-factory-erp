<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ExportBillResource\Pages;

use App\Filament\Admin\Resources\ExportBillResource;
use App\Filament\Support\EditsGarmentRecord;

class EditExportBill extends EditsGarmentRecord
{
    protected static string $resource = ExportBillResource::class;
}
