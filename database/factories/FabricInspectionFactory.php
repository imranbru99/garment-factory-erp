<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\FabricInspection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<FabricInspection> */
class FabricInspectionFactory extends Factory
{
    protected $model = FabricInspection::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
