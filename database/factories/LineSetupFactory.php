<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\LineSetup;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<LineSetup> */
class LineSetupFactory extends Factory
{
    protected $model = LineSetup::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
