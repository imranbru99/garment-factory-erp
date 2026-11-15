<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\NeedleLog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<NeedleLog> */
class NeedleLogFactory extends Factory
{
    protected $model = NeedleLog::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
