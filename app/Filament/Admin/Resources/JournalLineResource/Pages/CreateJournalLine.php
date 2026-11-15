<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\JournalLineResource\Pages;

use App\Filament\Admin\Resources\JournalLineResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateJournalLine extends CreatesGarmentRecord
{
    protected static string $resource = JournalLineResource::class;
}
