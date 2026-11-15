<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\CutPlan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<CutPlan> */
class CutPlanFactory extends Factory
{
    protected $model = CutPlan::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
