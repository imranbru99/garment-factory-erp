<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\RfqResource\Pages;

use App\Filament\Admin\Resources\RfqResource;
use App\Filament\Support\EditsGarmentRecord;

class EditRfq extends EditsGarmentRecord
{
    protected static string $resource = RfqResource::class;
}
