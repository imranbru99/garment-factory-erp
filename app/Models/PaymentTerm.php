<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class PaymentTerm extends GarmentModel
{
    protected $table = 'payment_terms';

    protected function casts(): array
    {
        return [
            'days' => 'integer',
        ];
    }

}
