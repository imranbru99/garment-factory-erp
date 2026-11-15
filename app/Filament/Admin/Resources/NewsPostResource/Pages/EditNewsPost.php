<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\NewsPostResource\Pages;

use App\Filament\Admin\Resources\NewsPostResource;
use App\Filament\Support\EditsGarmentRecord;

class EditNewsPost extends EditsGarmentRecord
{
    protected static string $resource = NewsPostResource::class;
}
