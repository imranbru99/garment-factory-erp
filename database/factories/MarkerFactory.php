<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Marker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<Marker> */
class MarkerFactory extends Factory
{
    protected $model = Marker::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
