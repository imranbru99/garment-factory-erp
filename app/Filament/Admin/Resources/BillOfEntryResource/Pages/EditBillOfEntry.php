<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BillOfEntryResource\Pages;

use App\Filament\Admin\Resources\BillOfEntryResource;
use App\Filament\Support\EditsGarmentRecord;

class EditBillOfEntry extends EditsGarmentRecord
{
    protected static string $resource = BillOfEntryResource::class;
}
