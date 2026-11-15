<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\SampleComment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<SampleComment> */
class SampleCommentFactory extends Factory
{
    protected $model = SampleComment::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
