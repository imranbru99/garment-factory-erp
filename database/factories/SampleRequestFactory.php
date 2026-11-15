<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\SampleRequest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<SampleRequest> */
class SampleRequestFactory extends Factory
{
    protected $model = SampleRequest::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
            'sample_type' => fake()->word(),
        ];
    }
}
