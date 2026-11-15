<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ModuleSetting extends GarmentModel
{
    protected $table = 'module_settings';

    protected function casts(): array
    {
        return [
            'enabled' => 'boolean',
        ];
    }

}
