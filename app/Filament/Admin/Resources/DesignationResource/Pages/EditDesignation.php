<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\DesignationResource\Pages;

use App\Filament\Admin\Resources\DesignationResource;
use App\Filament\Support\EditsGarmentRecord;

class EditDesignation extends EditsGarmentRecord
{
    protected static string $resource = DesignationResource::class;
}
