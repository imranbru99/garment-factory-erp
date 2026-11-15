<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BillOfEntryResource\Pages;

use App\Filament\Admin\Resources\BillOfEntryResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateBillOfEntry extends CreatesGarmentRecord
{
    protected static string $resource = BillOfEntryResource::class;
}
