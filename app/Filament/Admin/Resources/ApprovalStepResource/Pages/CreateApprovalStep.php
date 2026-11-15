<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ApprovalStepResource\Pages;

use App\Filament\Admin\Resources\ApprovalStepResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateApprovalStep extends CreatesGarmentRecord
{
    protected static string $resource = ApprovalStepResource::class;
}
