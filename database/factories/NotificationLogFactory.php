<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\NotificationLog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<NotificationLog> */
class NotificationLogFactory extends Factory
{
    protected $model = NotificationLog::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
            'channel' => fake()->word(),
        ];
    }
}
