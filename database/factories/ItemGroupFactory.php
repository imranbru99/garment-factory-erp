<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ItemGroup;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<ItemGroup> */
class ItemGroupFactory extends Factory
{
    protected $model = ItemGroup::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
