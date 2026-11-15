<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Capa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<Capa> */
class CapaFactory extends Factory
{
    protected $model = Capa::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
