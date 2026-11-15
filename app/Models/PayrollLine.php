<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class PayrollLine extends GarmentModel
{
    protected $table = 'payroll_lines';

    protected function casts(): array
    {
        return [
            'basic_minor' => 'integer',
            'ot_hours' => 'decimal:4',
            'ot_minor' => 'integer',
            'bonus_minor' => 'integer',
            'incentive_minor' => 'integer',
            'advance_minor' => 'integer',
            'deduction_minor' => 'integer',
            'net_minor' => 'integer',
            'absent_days' => 'decimal:4',
            'flags' => 'array',
        ];
    }

    /** @return BelongsTo<PayrollPeriod, $this> */
    public function payrollPeriod(): BelongsTo
    {
        return $this->belongsTo(PayrollPeriod::class, 'payroll_period_id');
    }
    /** @return BelongsTo<Employee, $this> */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
