<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\JournalEntryResource\Pages;

use App\Filament\Admin\Resources\JournalEntryResource;
use App\Filament\Support\EditsGarmentRecord;

class EditJournalEntry extends EditsGarmentRecord
{
    protected static string $resource = JournalEntryResource::class;
}
