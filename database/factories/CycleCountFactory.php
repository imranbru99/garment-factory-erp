<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\CycleCount;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<CycleCount> */
class CycleCountFactory extends Factory
{
    protected $model = CycleCount::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
