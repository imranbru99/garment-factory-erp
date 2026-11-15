<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class WashType extends GarmentModel
{
    protected $table = 'wash_types';

}
