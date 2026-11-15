<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\QuotationLine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<QuotationLine> */
class QuotationLineFactory extends Factory
{
    protected $model = QuotationLine::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
