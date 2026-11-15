<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Playbook extends GarmentModel
{
    protected $table = 'playbooks';

    /** @return BelongsTo<IssueType, $this> */
    public function issueType(): BelongsTo
    {
        return $this->belongsTo(IssueType::class, 'issue_type_id');
    }
}
