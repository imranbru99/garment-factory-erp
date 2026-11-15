<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Subcontractor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<Subcontractor> */
class SubcontractorFactory extends Factory
{
    protected $model = Subcontractor::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
