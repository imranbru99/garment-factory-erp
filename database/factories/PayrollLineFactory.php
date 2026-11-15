<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\PayrollLine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<PayrollLine> */
class PayrollLineFactory extends Factory
{
    protected $model = PayrollLine::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
