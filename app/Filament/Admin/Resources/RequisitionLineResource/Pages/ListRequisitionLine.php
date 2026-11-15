<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\RequisitionLineResource\Pages;

use App\Filament\Admin\Resources\RequisitionLineResource;
use App\Filament\Support\ListsGarmentRecords;

class ListRequisitionLine extends ListsGarmentRecords
{
    protected static string $resource = RequisitionLineResource::class;
}
