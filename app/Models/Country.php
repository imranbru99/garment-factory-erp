<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Country extends GarmentModel
{
    protected $table = 'countries';

}
