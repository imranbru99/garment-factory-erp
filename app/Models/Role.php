<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends GarmentModel
{
    protected $table = 'roles';

    protected function casts(): array
    {
        return [
            'panels' => 'array',
            'modules' => 'array',
            'requires_2fa' => 'boolean',
        ];
    }

    /** @return BelongsToMany<Permission, $this> */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    /** @return BelongsToMany<User, $this> */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
