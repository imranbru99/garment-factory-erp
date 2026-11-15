<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\LineStoppage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<LineStoppage> */
class LineStoppageFactory extends Factory
{
    protected $model = LineStoppage::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
