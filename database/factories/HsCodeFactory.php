<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\HsCode;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<HsCode> */
class HsCodeFactory extends Factory
{
    protected $model = HsCode::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
            'code' => fake()->unique()->bothify('??-####'),
        ];
    }
}
