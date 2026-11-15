<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\RecordComment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<RecordComment> */
class RecordCommentFactory extends Factory
{
    protected $model = RecordComment::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
