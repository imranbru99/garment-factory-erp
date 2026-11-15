<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Season extends GarmentModel
{
    protected $table = 'seasons';

    protected function casts(): array
    {
        return [
            'year' => 'integer',
        ];
    }

}
