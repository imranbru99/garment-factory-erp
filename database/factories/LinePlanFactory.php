<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\LinePlan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<LinePlan> */
class LinePlanFactory extends Factory
{
    protected $model = LinePlan::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
