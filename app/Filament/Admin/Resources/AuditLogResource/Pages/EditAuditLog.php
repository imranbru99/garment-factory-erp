<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\AuditLogResource\Pages;

use App\Filament\Admin\Resources\AuditLogResource;
use App\Filament\Support\EditsGarmentRecord;

class EditAuditLog extends EditsGarmentRecord
{
    protected static string $resource = AuditLogResource::class;
}
