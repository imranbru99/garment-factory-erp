<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\AuditFinding;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<AuditFinding> */
class AuditFindingFactory extends Factory
{
    protected $model = AuditFinding::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
