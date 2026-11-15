<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\AuditFindingResource\Pages;

use App\Filament\Admin\Resources\AuditFindingResource;
use App\Filament\Support\EditsGarmentRecord;

class EditAuditFinding extends EditsGarmentRecord
{
    protected static string $resource = AuditFindingResource::class;
}
