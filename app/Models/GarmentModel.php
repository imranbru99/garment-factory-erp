<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use RuntimeException;

abstract class GarmentModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    public static bool $auditing = true;

    /** @var array<string, array<string, bool>> */
    protected static array $columnCache = [];

    protected $guarded = ['id'];

    protected static function booted(): void
    {
        static::creating(function (self $model): void {
            if (blank($model->getAttribute('public_id'))) {
                $model->setAttribute('public_id', (string) Str::ulid());
            }
        });

        static::updating(function (self $model): void {
            if ($model->getTable() === 'audit_logs') {
                throw new RuntimeException('Audit logs are immutable.');
            }
        });

        static::deleting(function (self $model): void {
            if ($model->getTable() === 'audit_logs') {
                throw new RuntimeException('Audit logs are immutable.');
            }
        });

        static::created(function (self $model): void {
            static::writeAudit('created', $model);
        });

        static::updated(function (self $model): void {
            static::writeAudit('updated', $model);
        });

        static::deleted(function (self $model): void {
            static::writeAudit('deleted', $model);
        });

        static::addGlobalScope('factory-party', function (Builder $query): void {
            $user = auth()->user();
            if (! $user instanceof User) {
                return;
            }

            $model = $query->getModel();
            $table = $model->getTable();

            if ($user->portal === 'buyer' && $user->buyer_id && static::hasColumnCached($table, 'buyer_id')) {
                $query->where($table.'.buyer_id', $user->buyer_id);

                return;
            }

            if ($user->portal === 'supplier' && $user->supplier_id && static::hasColumnCached($table, 'supplier_id')) {
                $query->where($table.'.supplier_id', $user->supplier_id);

                return;
            }

            if ($user->portal === 'employee' && $user->employee_id && static::hasColumnCached($table, 'employee_id')) {
                $query->where($table.'.employee_id', $user->employee_id);

                return;
            }

            if (in_array($user->portal, ['admin', 'floor'], true)
                && ! $user->isSuperAdmin()
                && static::hasColumnCached($table, 'unit_id')) {
                $ids = $user->allowedUnitIds();
                $query->where(function (Builder $inner) use ($table, $ids): void {
                    $inner->whereNull($table.'.unit_id');
                    if ($ids !== []) {
                        $inner->orWhereIn($table.'.unit_id', $ids);
                    }
                });
            }
        });
    }

    protected static function writeAudit(string $event, self $model): void
    {
        if (! static::$auditing || $model->getTable() === 'audit_logs') {
            return;
        }

        $changes = $event === 'updated' ? $model->getChanges() : $model->getAttributes();
        unset($changes['updated_at'], $changes['password'], $changes['two_factor_secret']);

        AuditLog::withoutEvents(function () use ($event, $model, $changes): void {
            AuditLog::query()->insert([
                'public_id' => (string) Str::ulid(),
                'name' => class_basename($model).' '.$event,
                'user_id' => auth()->id(),
                'event' => $event,
                'auditable_type' => $model->getMorphClass(),
                'auditable_id' => $model->getKey(),
                'changes' => json_encode($changes),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });
    }

    protected static function hasColumnCached(string $table, string $column): bool
    {
        if (! isset(static::$columnCache[$table])) {
            try {
                static::$columnCache[$table] = array_fill_keys(Schema::getColumnListing($table), true);
            } catch (\Throwable) {
                static::$columnCache[$table] = [];
            }
        }

        return isset(static::$columnCache[$table][$column]);
    }
}
