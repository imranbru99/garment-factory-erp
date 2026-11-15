<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ApprovalRequestResource\Pages;

use App\Filament\Admin\Resources\ApprovalRequestResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateApprovalRequest extends CreatesGarmentRecord
{
    protected static string $resource = ApprovalRequestResource::class;
}
