<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ApprovalStepResource\Pages;

use App\Filament\Admin\Resources\ApprovalStepResource;
use App\Filament\Support\ListsGarmentRecords;

class ListApprovalStep extends ListsGarmentRecords
{
    protected static string $resource = ApprovalStepResource::class;
}
