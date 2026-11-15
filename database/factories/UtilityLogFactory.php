<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\UtilityLog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<UtilityLog> */
class UtilityLogFactory extends Factory
{
    protected $model = UtilityLog::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
