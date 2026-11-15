<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Rfq;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<Rfq> */
class RfqFactory extends Factory
{
    protected $model = Rfq::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
