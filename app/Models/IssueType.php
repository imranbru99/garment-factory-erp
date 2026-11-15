<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class IssueType extends GarmentModel
{
    protected $table = 'issue_types';

    protected function casts(): array
    {
        return [
            'sla_hours' => 'integer',
        ];
    }

}
