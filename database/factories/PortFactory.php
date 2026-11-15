<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Port;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<Port> */
class PortFactory extends Factory
{
    protected $model = Port::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
