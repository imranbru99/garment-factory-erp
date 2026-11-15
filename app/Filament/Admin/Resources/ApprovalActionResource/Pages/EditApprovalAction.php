<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ApprovalActionResource\Pages;

use App\Filament\Admin\Resources\ApprovalActionResource;
use App\Filament\Support\EditsGarmentRecord;

class EditApprovalAction extends EditsGarmentRecord
{
    protected static string $resource = ApprovalActionResource::class;
}
