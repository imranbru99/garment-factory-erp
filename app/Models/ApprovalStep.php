<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ApprovalStep extends GarmentModel
{
    protected $table = 'approval_steps';

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'level' => 'integer',
        ];
    }

    /** @return BelongsTo<ApprovalChain, $this> */
    public function approvalChain(): BelongsTo
    {
        return $this->belongsTo(ApprovalChain::class, 'approval_chain_id');
    }
    /** @return BelongsTo<Role, $this> */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
