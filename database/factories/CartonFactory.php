<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Carton;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<Carton> */
class CartonFactory extends Factory
{
    protected $model = Carton::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
