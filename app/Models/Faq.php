<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Faq extends GarmentModel
{
    protected $table = 'faqs';

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }

}
