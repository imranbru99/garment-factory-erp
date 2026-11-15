<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\OperationBulletinResource\Pages;

use App\Filament\Admin\Resources\OperationBulletinResource;
use App\Filament\Support\ListsGarmentRecords;

class ListOperationBulletin extends ListsGarmentRecords
{
    protected static string $resource = OperationBulletinResource::class;
}
