<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\IssueTypeResource\Pages;

use App\Filament\Admin\Resources\IssueTypeResource;
use App\Filament\Support\ListsGarmentRecords;

class ListIssueType extends ListsGarmentRecords
{
    protected static string $resource = IssueTypeResource::class;
}
