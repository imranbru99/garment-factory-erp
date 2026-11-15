<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\FabricRoll;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<FabricRoll> */
class FabricRollFactory extends Factory
{
    protected $model = FabricRoll::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
