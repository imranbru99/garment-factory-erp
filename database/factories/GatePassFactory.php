<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\GatePass;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<GatePass> */
class GatePassFactory extends Factory
{
    protected $model = GatePass::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
