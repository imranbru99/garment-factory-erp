<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\QcInspection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<QcInspection> */
class QcInspectionFactory extends Factory
{
    protected $model = QcInspection::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
