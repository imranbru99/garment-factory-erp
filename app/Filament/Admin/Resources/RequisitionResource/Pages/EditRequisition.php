<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\RequisitionResource\Pages;

use App\Filament\Admin\Resources\RequisitionResource;
use App\Filament\Support\EditsGarmentRecord;

class EditRequisition extends EditsGarmentRecord
{
    protected static string $resource = RequisitionResource::class;
}
