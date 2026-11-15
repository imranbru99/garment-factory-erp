<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ApprovalChainResource\Pages;

use App\Filament\Admin\Resources\ApprovalChainResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateApprovalChain extends CreatesGarmentRecord
{
    protected static string $resource = ApprovalChainResource::class;
}
