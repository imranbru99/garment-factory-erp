<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\WashType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<WashType> */
class WashTypeFactory extends Factory
{
    protected $model = WashType::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
