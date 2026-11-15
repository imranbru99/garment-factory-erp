<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\TnaTemplateTask;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<TnaTemplateTask> */
class TnaTemplateTaskFactory extends Factory
{
    protected $model = TnaTemplateTask::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
