<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\RequisitionLineResource\Pages;

use App\Filament\Admin\Resources\RequisitionLineResource;
use App\Filament\Support\EditsGarmentRecord;

class EditRequisitionLine extends EditsGarmentRecord
{
    protected static string $resource = RequisitionLineResource::class;
}
