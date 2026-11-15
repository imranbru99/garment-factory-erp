<?php

declare(strict_types=1);

namespace App\Filament\Floor\Resources\IssueResource\Pages;

use App\Filament\Floor\Resources\IssueResource;
use App\Filament\Support\ListsGarmentRecords;

class ListIssue extends ListsGarmentRecords
{
    protected static string $resource = IssueResource::class;
}
