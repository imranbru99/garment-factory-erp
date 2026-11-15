<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\MeasurementPoint;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<MeasurementPoint> */
class MeasurementPointFactory extends Factory
{
    protected $model = MeasurementPoint::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
