<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Size extends GarmentModel
{
    protected $table = 'sizes';

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }

}
