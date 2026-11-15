<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ApprovalStep;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<ApprovalStep> */
class ApprovalStepFactory extends Factory
{
    protected $model = ApprovalStep::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
