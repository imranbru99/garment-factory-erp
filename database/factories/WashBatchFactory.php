<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\WashBatch;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<WashBatch> */
class WashBatchFactory extends Factory
{
    protected $model = WashBatch::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
