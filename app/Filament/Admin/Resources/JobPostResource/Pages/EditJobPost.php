<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\JobPostResource\Pages;

use App\Filament\Admin\Resources\JobPostResource;
use App\Filament\Support\EditsGarmentRecord;

class EditJobPost extends EditsGarmentRecord
{
    protected static string $resource = JobPostResource::class;
}
