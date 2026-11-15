<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\RfqQuote;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<RfqQuote> */
class RfqQuoteFactory extends Factory
{
    protected $model = RfqQuote::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
