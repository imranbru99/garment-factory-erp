<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\BuyerContact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<BuyerContact> */
class BuyerContactFactory extends Factory
{
    protected $model = BuyerContact::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
