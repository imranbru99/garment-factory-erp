<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ApplicantResource\Pages;

use App\Filament\Admin\Resources\ApplicantResource;
use App\Filament\Support\EditsGarmentRecord;

class EditApplicant extends EditsGarmentRecord
{
    protected static string $resource = ApplicantResource::class;
}
