<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class QcDefect extends GarmentModel
{
    protected $table = 'qc_defects';

    protected function casts(): array
    {
        return [
            'qty' => 'integer',
        ];
    }

    /** @return BelongsTo<QcInspection, $this> */
    public function qcInspection(): BelongsTo
    {
        return $this->belongsTo(QcInspection::class, 'qc_inspection_id');
    }
    /** @return BelongsTo<Defect, $this> */
    public function defect(): BelongsTo
    {
        return $this->belongsTo(Defect::class, 'defect_id');
    }
}
