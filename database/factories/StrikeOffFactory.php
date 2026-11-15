<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\StrikeOff;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<StrikeOff> */
class StrikeOffFactory extends Factory
{
    protected $model = StrikeOff::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
