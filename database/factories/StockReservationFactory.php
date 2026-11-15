<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\StockReservation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<StockReservation> */
class StockReservationFactory extends Factory
{
    protected $model = StockReservation::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
