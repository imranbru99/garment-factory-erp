<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\IssueTaskResource\Pages;

use App\Filament\Admin\Resources\IssueTaskResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateIssueTask extends CreatesGarmentRecord
{
    protected static string $resource = IssueTaskResource::class;
}
