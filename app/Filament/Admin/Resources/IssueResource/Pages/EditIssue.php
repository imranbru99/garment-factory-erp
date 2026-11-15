<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\IssueResource\Pages;

use App\Filament\Admin\Resources\IssueResource;
use App\Filament\Support\EditsGarmentRecord;

class EditIssue extends EditsGarmentRecord
{
    protected static string $resource = IssueResource::class;
}
