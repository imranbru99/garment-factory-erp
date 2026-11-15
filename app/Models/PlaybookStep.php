<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class PlaybookStep extends GarmentModel
{
    protected $table = 'playbook_steps';

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }

    /** @return BelongsTo<Playbook, $this> */
    public function playbook(): BelongsTo
    {
        return $this->belongsTo(Playbook::class, 'playbook_id');
    }
}
