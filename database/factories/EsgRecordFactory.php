<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\EsgRecord;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<EsgRecord> */
class EsgRecordFactory extends Factory
{
    protected $model = EsgRecord::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
