<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ApBillResource\Pages;

use App\Filament\Admin\Resources\ApBillResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateApBill extends CreatesGarmentRecord
{
    protected static string $resource = ApBillResource::class;
}
