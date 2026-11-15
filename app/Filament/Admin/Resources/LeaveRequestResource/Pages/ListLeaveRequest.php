<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LeaveRequestResource\Pages;

use App\Filament\Admin\Resources\LeaveRequestResource;
use App\Filament\Support\ListsGarmentRecords;

class ListLeaveRequest extends ListsGarmentRecords
{
    protected static string $resource = LeaveRequestResource::class;
}
