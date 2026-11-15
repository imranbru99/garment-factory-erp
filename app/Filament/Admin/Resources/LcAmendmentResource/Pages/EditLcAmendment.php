<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LcAmendmentResource\Pages;

use App\Filament\Admin\Resources\LcAmendmentResource;
use App\Filament\Support\EditsGarmentRecord;

class EditLcAmendment extends EditsGarmentRecord
{
    protected static string $resource = LcAmendmentResource::class;
}
