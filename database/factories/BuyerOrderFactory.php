<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\BuyerOrder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<BuyerOrder> */
class BuyerOrderFactory extends Factory
{
    protected $model = BuyerOrder::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
