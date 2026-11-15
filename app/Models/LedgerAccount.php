<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class LedgerAccount extends GarmentModel
{
    protected $table = 'ledger_accounts';

    /** @return BelongsTo<LedgerAccount, $this> */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(LedgerAccount::class, 'parent_id');
    }
}
