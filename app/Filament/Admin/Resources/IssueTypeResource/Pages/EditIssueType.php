<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\IssueTypeResource\Pages;

use App\Filament\Admin\Resources\IssueTypeResource;
use App\Filament\Support\EditsGarmentRecord;

class EditIssueType extends EditsGarmentRecord
{
    protected static string $resource = IssueTypeResource::class;
}
