<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\PlanSlot;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<PlanSlot> */
class PlanSlotFactory extends Factory
{
    protected $model = PlanSlot::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
