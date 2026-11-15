<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ApprovalStepResource\Pages;

use App\Filament\Admin\Resources\ApprovalStepResource;
use App\Filament\Support\EditsGarmentRecord;

class EditApprovalStep extends EditsGarmentRecord
{
    protected static string $resource = ApprovalStepResource::class;
}
