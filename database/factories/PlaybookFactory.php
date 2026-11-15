<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Playbook;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<Playbook> */
class PlaybookFactory extends Factory
{
    protected $model = Playbook::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
