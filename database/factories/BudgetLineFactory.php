<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\BudgetLine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<BudgetLine> */
class BudgetLineFactory extends Factory
{
    protected $model = BudgetLine::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
