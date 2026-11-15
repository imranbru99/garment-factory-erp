<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class TeamMember extends GarmentModel
{
    protected $table = 'team_members';

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }

}
