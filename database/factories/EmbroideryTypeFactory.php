<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\EmbroideryType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<EmbroideryType> */
class EmbroideryTypeFactory extends Factory
{
    protected $model = EmbroideryType::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
