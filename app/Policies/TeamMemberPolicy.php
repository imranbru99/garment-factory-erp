<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\TeamMember;

class TeamMemberPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return TeamMember::class;
    }

    protected function module(): string
    {
        return 'website';
    }
}
