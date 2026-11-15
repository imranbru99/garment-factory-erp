<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ApprovalChainResource\Pages;

use App\Filament\Admin\Resources\ApprovalChainResource;
use App\Filament\Support\ListsGarmentRecords;

class ListApprovalChain extends ListsGarmentRecords
{
    protected static string $resource = ApprovalChainResource::class;
}
