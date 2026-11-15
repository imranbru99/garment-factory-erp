<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\StockBalance;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<StockBalance> */
class StockBalanceFactory extends Factory
{
    protected $model = StockBalance::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
