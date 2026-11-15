<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class FabricConstruction extends GarmentModel
{
    protected $table = 'fabric_constructions';

    protected function casts(): array
    {
        return [
            'gsm' => 'decimal:4',
            'width_inch' => 'decimal:4',
            'shrinkage_percent' => 'decimal:4',
        ];
    }

}
