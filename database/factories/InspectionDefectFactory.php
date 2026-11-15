<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\InspectionDefect;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<InspectionDefect> */
class InspectionDefectFactory extends Factory
{
    protected $model = InspectionDefect::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
