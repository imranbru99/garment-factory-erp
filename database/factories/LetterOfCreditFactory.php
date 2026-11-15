<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\LetterOfCredit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<LetterOfCredit> */
class LetterOfCreditFactory extends Factory
{
    protected $model = LetterOfCredit::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
            'lc_type' => fake()->word(),
        ];
    }
}
