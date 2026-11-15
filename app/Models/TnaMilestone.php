<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class TnaMilestone extends GarmentModel
{
    protected $table = 'tna_milestones';

    protected function casts(): array
    {
        return [
            'due_on' => 'date',
            'completed_on' => 'date',
            'sort_order' => 'integer',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<BuyerOrder, $this> */
    public function buyerOrder(): BelongsTo
    {
        return $this->belongsTo(BuyerOrder::class, 'buyer_order_id');
    }
    /** @return BelongsTo<TnaTemplateTask, $this> */
    public function tnaTemplateTask(): BelongsTo
    {
        return $this->belongsTo(TnaTemplateTask::class, 'tna_template_task_id');
    }
    /** @return BelongsTo<User, $this> */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
