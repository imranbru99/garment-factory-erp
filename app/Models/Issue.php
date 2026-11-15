<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Issue extends GarmentModel
{
    protected $table = 'issues';

    protected function casts(): array
    {
        return [
            'sla_due_at' => 'datetime',
            'impact_days' => 'decimal:4',
            'impact_cost_minor' => 'integer',
            'recurrence_count' => 'integer',
            'linked_id' => 'integer',
            'acknowledged_at' => 'datetime',
            'resolved_at' => 'datetime',
            'verified_at' => 'datetime',
            'closed_at' => 'datetime',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    /** @return BelongsTo<IssueType, $this> */
    public function issueType(): BelongsTo
    {
        return $this->belongsTo(IssueType::class, 'issue_type_id');
    }

    /** @return BelongsTo<User, $this> */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /** @return BelongsTo<User, $this> */
    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    /** @return BelongsTo<BuyerOrder, $this> */
    public function buyerOrder(): BelongsTo
    {
        return $this->belongsTo(BuyerOrder::class, 'buyer_order_id');
    }

    /** @return BelongsTo<Line, $this> */
    public function line(): BelongsTo
    {
        return $this->belongsTo(Line::class, 'line_id');
    }

    /** @return HasMany<IssueTask, $this> */
    public function tasks(): HasMany
    {
        return $this->hasMany(IssueTask::class);
    }
}
