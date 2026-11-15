<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Costing;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<Costing> */
class CostingFactory extends Factory
{
    protected $model = Costing::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
