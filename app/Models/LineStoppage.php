<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class LineStoppage extends GarmentModel
{
    protected $table = 'line_stoppages';

    protected function casts(): array
    {
        return [
            'minutes' => 'integer',
            'started_at' => 'datetime',
            'ended_at' => 'datetime',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<Line, $this> */
    public function line(): BelongsTo
    {
        return $this->belongsTo(Line::class, 'line_id');
    }
}
