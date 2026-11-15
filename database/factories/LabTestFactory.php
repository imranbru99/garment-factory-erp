<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\LabTest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<LabTest> */
class LabTestFactory extends Factory
{
    protected $model = LabTest::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
