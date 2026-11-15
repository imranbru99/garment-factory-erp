<?php

declare(strict_types=1);

namespace App\Filament\Floor\Resources\IssueResource\Pages;

use App\Filament\Floor\Resources\IssueResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateIssue extends CreatesGarmentRecord
{
    protected static string $resource = IssueResource::class;
}
