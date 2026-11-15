<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\NumberingSeries;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<NumberingSeries> */
class NumberingSeriesFactory extends Factory
{
    protected $model = NumberingSeries::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
            'document_type' => fake()->word(),
            'prefix' => fake()->word(),
        ];
    }
}
