<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\QcDefectResource\Pages;

use App\Filament\Admin\Resources\QcDefectResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateQcDefect extends CreatesGarmentRecord
{
    protected static string $resource = QcDefectResource::class;
}
