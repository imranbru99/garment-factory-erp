<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\RecordCommentResource\Pages;

use App\Filament\Admin\Resources\RecordCommentResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateRecordComment extends CreatesGarmentRecord
{
    protected static string $resource = RecordCommentResource::class;
}
