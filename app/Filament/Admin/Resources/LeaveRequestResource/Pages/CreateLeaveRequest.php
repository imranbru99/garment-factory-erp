<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LeaveRequestResource\Pages;

use App\Filament\Admin\Resources\LeaveRequestResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateLeaveRequest extends CreatesGarmentRecord
{
    protected static string $resource = LeaveRequestResource::class;
}
