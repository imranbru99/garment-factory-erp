<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PaymentTermResource\Pages;

use App\Filament\Admin\Resources\PaymentTermResource;
use App\Filament\Support\ListsGarmentRecords;

class ListPaymentTerm extends ListsGarmentRecords
{
    protected static string $resource = PaymentTermResource::class;
}
