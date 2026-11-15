<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SampleRequestResource\Pages;

use App\Filament\Admin\Resources\SampleRequestResource;
use App\Filament\Support\ListsGarmentRecords;

class ListSampleRequest extends ListsGarmentRecords
{
    protected static string $resource = SampleRequestResource::class;
}
