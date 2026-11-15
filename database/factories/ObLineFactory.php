<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ObLine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<ObLine> */
class ObLineFactory extends Factory
{
    protected $model = ObLine::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
