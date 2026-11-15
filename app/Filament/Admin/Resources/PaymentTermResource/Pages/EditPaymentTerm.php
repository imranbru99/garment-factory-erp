<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PaymentTermResource\Pages;

use App\Filament\Admin\Resources\PaymentTermResource;
use App\Filament\Support\EditsGarmentRecord;

class EditPaymentTerm extends EditsGarmentRecord
{
    protected static string $resource = PaymentTermResource::class;
}
