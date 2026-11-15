<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\TnaMilestone;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<TnaMilestone> */
class TnaMilestoneFactory extends Factory
{
    protected $model = TnaMilestone::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
