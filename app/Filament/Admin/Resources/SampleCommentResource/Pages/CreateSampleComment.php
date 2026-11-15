<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SampleCommentResource\Pages;

use App\Filament\Admin\Resources\SampleCommentResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateSampleComment extends CreatesGarmentRecord
{
    protected static string $resource = SampleCommentResource::class;
}
