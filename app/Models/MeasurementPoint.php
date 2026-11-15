<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class MeasurementPoint extends GarmentModel
{
    protected $table = 'measurement_points';

    protected function casts(): array
    {
        return [
            'spec_value' => 'decimal:4',
            'tolerance' => 'decimal:4',
        ];
    }

    /** @return BelongsTo<Style, $this> */
    public function style(): BelongsTo
    {
        return $this->belongsTo(Style::class, 'style_id');
    }
    /** @return BelongsTo<Size, $this> */
    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}
