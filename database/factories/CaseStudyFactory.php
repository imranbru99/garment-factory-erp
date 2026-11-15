<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\CaseStudy;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<CaseStudy> */
class CaseStudyFactory extends Factory
{
    protected $model = CaseStudy::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
