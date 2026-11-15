<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\IssueTaskResource\Pages;

use App\Filament\Admin\Resources\IssueTaskResource;
use App\Filament\Support\ListsGarmentRecords;

class ListIssueTask extends ListsGarmentRecords
{
    protected static string $resource = IssueTaskResource::class;
}
