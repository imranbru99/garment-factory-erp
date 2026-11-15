<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\BondEntry;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<BondEntry> */
class BondEntryFactory extends Factory
{
    protected $model = BondEntry::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
            'direction' => fake()->word(),
        ];
    }
}
