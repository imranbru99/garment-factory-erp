<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Loan extends GarmentModel
{
    protected $table = 'loans';

    protected function casts(): array
    {
        return [
            'principal_minor' => 'integer',
            'balance_minor' => 'integer',
        ];
    }

    /** @return BelongsTo<Employee, $this> */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
