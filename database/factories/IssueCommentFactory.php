<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\IssueComment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<IssueComment> */
class IssueCommentFactory extends Factory
{
    protected $model = IssueComment::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
