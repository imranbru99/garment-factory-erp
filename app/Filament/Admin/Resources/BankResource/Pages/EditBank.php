<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BankResource\Pages;

use App\Filament\Admin\Resources\BankResource;
use App\Filament\Support\EditsGarmentRecord;

class EditBank extends EditsGarmentRecord
{
    protected static string $resource = BankResource::class;
}
