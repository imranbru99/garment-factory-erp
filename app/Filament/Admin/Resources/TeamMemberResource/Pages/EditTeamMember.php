<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\TeamMemberResource\Pages;

use App\Filament\Admin\Resources\TeamMemberResource;
use App\Filament\Support\EditsGarmentRecord;

class EditTeamMember extends EditsGarmentRecord
{
    protected static string $resource = TeamMemberResource::class;
}
