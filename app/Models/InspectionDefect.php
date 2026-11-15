<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class InspectionDefect extends GarmentModel
{
    protected $table = 'inspection_defects';

    protected function casts(): array
    {
        return [
            'points' => 'decimal:4',
            'position_m' => 'decimal:4',
        ];
    }

    /** @return BelongsTo<FabricInspection, $this> */
    public function fabricInspection(): BelongsTo
    {
        return $this->belongsTo(FabricInspection::class, 'fabric_inspection_id');
    }
    /** @return BelongsTo<Defect, $this> */
    public function defect(): BelongsTo
    {
        return $this->belongsTo(Defect::class, 'defect_id');
    }
}
