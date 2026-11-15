<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class IssueTask extends GarmentModel
{
    protected $table = 'issue_tasks';

    protected function casts(): array
    {
        return [
            'due_on' => 'date',
        ];
    }

    /** @return BelongsTo<Issue, $this> */
    public function issue(): BelongsTo
    {
        return $this->belongsTo(Issue::class, 'issue_id');
    }
    /** @return BelongsTo<PlaybookStep, $this> */
    public function playbookStep(): BelongsTo
    {
        return $this->belongsTo(PlaybookStep::class, 'playbook_step_id');
    }
    /** @return BelongsTo<User, $this> */
    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }
}
