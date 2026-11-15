<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\NumberingCounter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<NumberingCounter> */
class NumberingCounterFactory extends Factory
{
    protected $model = NumberingCounter::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
            'fiscal_year' => fake()->word(),
        ];
    }
}
