<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /** @var list<string>|null */
    public ?array $permissionNameCache = null;

    public ?bool $superAdminCache = null;

    /** @var list<int>|null */
    public ?array $unitIdCache = null;

    protected $fillable = [
        'name',
        'name_bn',
        'email',
        'password',
        'phone',
        'locale',
        'is_active',
        'portal',
        'current_unit_id',
        'buyer_id',
        'supplier_id',
        'employee_id',
        'two_factor_secret',
        'two_factor_confirmed_at',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
            'two_factor_confirmed_at' => 'datetime',
            'last_login_at' => 'datetime',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if (! $this->is_active) {
            return false;
        }

        if ($this->isSuperAdmin()) {
            return true;
        }

        return in_array($panel->getId(), $this->allowedPanels(), true);
    }

    /** @return list<string> */
    public function allowedPanels(): array
    {
        $panels = [];
        foreach ($this->roles()->withoutGlobalScopes()->get() as $role) {
            foreach ($role->panels ?? [] as $panel) {
                $panels[] = (string) $panel;
            }
        }

        return array_values(array_unique($panels));
    }

    public function isSuperAdmin(): bool
    {
        if ($this->superAdminCache !== null) {
            return $this->superAdminCache;
        }

        $this->superAdminCache = $this->roles()->withoutGlobalScopes()->where('slug', 'super-admin')->exists();

        return $this->superAdminCache;
    }

    /** @return list<string> */
    public function permissionNames(): array
    {
        if ($this->permissionNameCache !== null) {
            return $this->permissionNameCache;
        }

        $roleIds = $this->roles()->withoutGlobalScopes()->pluck('roles.id');
        $this->permissionNameCache = Permission::query()
            ->withoutGlobalScopes()
            ->whereHas('roles', fn ($query) => $query->withoutGlobalScopes()->whereIn('roles.id', $roleIds))
            ->pluck('slug')
            ->all();

        return $this->permissionNameCache;
    }

    /** @return list<int> */
    public function allowedUnitIds(): array
    {
        if ($this->unitIdCache !== null) {
            return $this->unitIdCache;
        }

        $this->unitIdCache = $this->units()->withoutGlobalScopes()->pluck('units.id')->map(fn ($id) => (int) $id)->all();

        return $this->unitIdCache;
    }

    /** @return BelongsToMany<Role, $this> */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /** @return BelongsToMany<Unit, $this> */
    public function units(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class);
    }

    /** @return BelongsTo<Buyer, $this> */
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(Buyer::class);
    }

    /** @return BelongsTo<Supplier, $this> */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    /** @return BelongsTo<Employee, $this> */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
