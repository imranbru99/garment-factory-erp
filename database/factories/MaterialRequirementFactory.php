<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\MaterialRequirement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<MaterialRequirement> */
class MaterialRequirementFactory extends Factory
{
    protected $model = MaterialRequirement::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
