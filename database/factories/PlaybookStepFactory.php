<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\PlaybookStep;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<PlaybookStep> */
class PlaybookStepFactory extends Factory
{
    protected $model = PlaybookStep::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
