<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\TnaTemplate;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<TnaTemplate> */
class TnaTemplateFactory extends Factory
{
    protected $model = TnaTemplate::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
