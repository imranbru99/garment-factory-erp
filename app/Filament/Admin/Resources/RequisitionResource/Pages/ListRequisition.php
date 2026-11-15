<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\RequisitionResource\Pages;

use App\Filament\Admin\Resources\RequisitionResource;
use App\Filament\Support\ListsGarmentRecords;

class ListRequisition extends ListsGarmentRecords
{
    protected static string $resource = RequisitionResource::class;
}
