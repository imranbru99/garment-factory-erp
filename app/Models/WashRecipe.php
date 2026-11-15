<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class WashRecipe extends GarmentModel
{
    protected $table = 'wash_recipes';

    protected function casts(): array
    {
        return [
            'chemicals' => 'array',
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
    /** @return BelongsTo<WashType, $this> */
    public function washType(): BelongsTo
    {
        return $this->belongsTo(WashType::class, 'wash_type_id');
    }
}
