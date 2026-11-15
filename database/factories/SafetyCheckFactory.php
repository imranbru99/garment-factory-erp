<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\SafetyCheck;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<SafetyCheck> */
class SafetyCheckFactory extends Factory
{
    protected $model = SafetyCheck::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
