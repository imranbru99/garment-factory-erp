<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\OrderRevision;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<OrderRevision> */
class OrderRevisionFactory extends Factory
{
    protected $model = OrderRevision::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
