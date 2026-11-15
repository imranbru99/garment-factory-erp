<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SampleCommentResource\Pages;

use App\Filament\Admin\Resources\SampleCommentResource;
use App\Filament\Support\EditsGarmentRecord;

class EditSampleComment extends EditsGarmentRecord
{
    protected static string $resource = SampleCommentResource::class;
}
