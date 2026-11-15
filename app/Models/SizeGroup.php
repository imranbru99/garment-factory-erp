<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class SizeGroup extends GarmentModel
{
    protected $table = 'size_groups';

    protected function casts(): array
    {
        return [
            'sizes' => 'array',
        ];
    }

}
