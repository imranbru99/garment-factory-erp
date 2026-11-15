<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\TeamMemberResource\Pages;

use App\Filament\Admin\Resources\TeamMemberResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateTeamMember extends CreatesGarmentRecord
{
    protected static string $resource = TeamMemberResource::class;
}
