<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\BuyerVisit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<BuyerVisit> */
class BuyerVisitFactory extends Factory
{
    protected $model = BuyerVisit::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
