<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\IssueCommentResource\Pages;

use App\Filament\Admin\Resources\IssueCommentResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateIssueComment extends CreatesGarmentRecord
{
    protected static string $resource = IssueCommentResource::class;
}
