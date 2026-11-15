<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class AppSetting extends GarmentModel
{
    protected $table = 'app_settings';

    protected function casts(): array
    {
        return [
            'value' => 'array',
        ];
    }

}
