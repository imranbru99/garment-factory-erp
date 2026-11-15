<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\FaqResource\Pages;

use App\Filament\Admin\Resources\FaqResource;
use App\Filament\Support\EditsGarmentRecord;

class EditFaq extends EditsGarmentRecord
{
    protected static string $resource = FaqResource::class;
}
