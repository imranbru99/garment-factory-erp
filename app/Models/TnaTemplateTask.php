<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class TnaTemplateTask extends GarmentModel
{
    protected $table = 'tna_template_tasks';

    protected function casts(): array
    {
        return [
            'offset_days' => 'integer',
            'sort_order' => 'integer',
        ];
    }

    /** @return BelongsTo<TnaTemplate, $this> */
    public function tnaTemplate(): BelongsTo
    {
        return $this->belongsTo(TnaTemplate::class, 'tna_template_id');
    }
    /** @return BelongsTo<Department, $this> */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
