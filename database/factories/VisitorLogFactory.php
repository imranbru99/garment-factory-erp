<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\VisitorLog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<VisitorLog> */
class VisitorLogFactory extends Factory
{
    protected $model = VisitorLog::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
