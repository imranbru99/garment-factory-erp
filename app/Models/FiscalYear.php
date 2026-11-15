<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class FiscalYear extends GarmentModel
{
    protected $table = 'fiscal_years';

    protected function casts(): array
    {
        return [
            'starts_on' => 'date',
            'ends_on' => 'date',
            'is_open' => 'boolean',
        ];
    }

}
