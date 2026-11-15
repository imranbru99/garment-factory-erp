<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\FabricConstruction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<FabricConstruction> */
class FabricConstructionFactory extends Factory
{
    protected $model = FabricConstruction::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
