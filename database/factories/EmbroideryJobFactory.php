<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\EmbroideryJob;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<EmbroideryJob> */
class EmbroideryJobFactory extends Factory
{
    protected $model = EmbroideryJob::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
