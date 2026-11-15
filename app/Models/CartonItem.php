<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class CartonItem extends GarmentModel
{
    protected $table = 'carton_items';

    protected function casts(): array
    {
        return [
            'qty' => 'integer',
        ];
    }

    /** @return BelongsTo<Carton, $this> */
    public function carton(): BelongsTo
    {
        return $this->belongsTo(Carton::class, 'carton_id');
    }
    /** @return BelongsTo<Color, $this> */
    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
    /** @return BelongsTo<Size, $this> */
    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}
