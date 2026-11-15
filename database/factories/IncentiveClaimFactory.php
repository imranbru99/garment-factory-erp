<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\IncentiveClaim;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<IncentiveClaim> */
class IncentiveClaimFactory extends Factory
{
    protected $model = IncentiveClaim::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
