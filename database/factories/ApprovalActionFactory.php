<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ApprovalAction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<ApprovalAction> */
class ApprovalActionFactory extends Factory
{
    protected $model = ApprovalAction::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
            'decision' => fake()->word(),
        ];
    }
}
