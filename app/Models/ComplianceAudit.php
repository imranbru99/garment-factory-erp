<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ComplianceAudit extends GarmentModel
{
    protected $table = 'compliance_audits';

    protected function casts(): array
    {
        return [
            'audited_on' => 'date',
            'score' => 'decimal:4',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
