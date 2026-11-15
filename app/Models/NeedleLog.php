<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class NeedleLog extends GarmentModel
{
    protected $table = 'needle_logs';

    protected function casts(): array
    {
        return [
            'issued_qty' => 'integer',
            'returned_qty' => 'integer',
            'broken_qty' => 'integer',
            'logged_on' => 'date',
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
