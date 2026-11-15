<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Costing extends GarmentModel
{
    protected $table = 'costings';

    protected function casts(): array
    {
        return [
            'version' => 'integer',
            'exchange_rate' => 'decimal:4',
            'fabric_minor' => 'integer',
            'trims_minor' => 'integer',
            'cm_minor' => 'integer',
            'wash_minor' => 'integer',
            'print_minor' => 'integer',
            'test_minor' => 'integer',
            'overhead_minor' => 'integer',
            'commercial_minor' => 'integer',
            'profit_minor' => 'integer',
            'fob_minor' => 'integer',
            'smv' => 'decimal:4',
            'efficiency' => 'decimal:4',
            'line_cost_minor' => 'integer',
            'consumption' => 'decimal:4',
            'wastage_percent' => 'decimal:4',
            'approved_at' => 'datetime',
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
}
