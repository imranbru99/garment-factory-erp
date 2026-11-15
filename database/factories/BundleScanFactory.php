<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\BundleScan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<BundleScan> */
class BundleScanFactory extends Factory
{
    protected $model = BundleScan::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
