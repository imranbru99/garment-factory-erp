<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ApprovalActionResource\Pages;

use App\Filament\Admin\Resources\ApprovalActionResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateApprovalAction extends CreatesGarmentRecord
{
    protected static string $resource = ApprovalActionResource::class;
}
