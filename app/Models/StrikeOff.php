<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class StrikeOff extends GarmentModel
{
    protected $table = 'strike_offs';

    protected function casts(): array
    {
        return [
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<Style, $this> */
    public function style(): BelongsTo
    {
        return $this->belongsTo(Style::class, 'style_id');
    }
    /** @return BelongsTo<EmbroideryType, $this> */
    public function embroideryType(): BelongsTo
    {
        return $this->belongsTo(EmbroideryType::class, 'embroidery_type_id');
    }
}
