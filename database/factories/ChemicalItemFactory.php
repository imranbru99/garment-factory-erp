<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ChemicalItem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<ChemicalItem> */
class ChemicalItemFactory extends Factory
{
    protected $model = ChemicalItem::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
