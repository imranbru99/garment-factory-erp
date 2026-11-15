<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Currency extends GarmentModel
{
    protected $table = 'currencies';

    protected function casts(): array
    {
        return [
            'is_base' => 'boolean',
        ];
    }

}
