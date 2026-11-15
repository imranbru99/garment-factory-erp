<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\OrderRevisionResource\Pages;

use App\Filament\Admin\Resources\OrderRevisionResource;
use App\Filament\Support\EditsGarmentRecord;

class EditOrderRevision extends EditsGarmentRecord
{
    protected static string $resource = OrderRevisionResource::class;
}
