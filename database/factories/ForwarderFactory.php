<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Forwarder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<Forwarder> */
class ForwarderFactory extends Factory
{
    protected $model = Forwarder::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
