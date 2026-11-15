<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class AuditFinding extends GarmentModel
{
    protected $table = 'audit_findings';

    protected function casts(): array
    {
        return [
            'due_on' => 'date',
        ];
    }

    /** @return BelongsTo<ComplianceAudit, $this> */
    public function complianceAudit(): BelongsTo
    {
        return $this->belongsTo(ComplianceAudit::class, 'compliance_audit_id');
    }
}
