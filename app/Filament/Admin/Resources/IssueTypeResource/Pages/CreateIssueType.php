<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\IssueTypeResource\Pages;

use App\Filament\Admin\Resources\IssueTypeResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateIssueType extends CreatesGarmentRecord
{
    protected static string $resource = IssueTypeResource::class;
}
