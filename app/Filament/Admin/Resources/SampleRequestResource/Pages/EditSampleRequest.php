<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SampleRequestResource\Pages;

use App\Filament\Admin\Resources\SampleRequestResource;
use App\Filament\Support\EditsGarmentRecord;

class EditSampleRequest extends EditsGarmentRecord
{
    protected static string $resource = SampleRequestResource::class;
}
