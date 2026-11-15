<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\JournalEntryResource\Pages;

use App\Filament\Admin\Resources\JournalEntryResource;
use App\Filament\Support\ListsGarmentRecords;

class ListJournalEntry extends ListsGarmentRecords
{
    protected static string $resource = JournalEntryResource::class;
}
