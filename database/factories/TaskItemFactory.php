<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\TaskItem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<TaskItem> */
class TaskItemFactory extends Factory
{
    protected $model = TaskItem::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
