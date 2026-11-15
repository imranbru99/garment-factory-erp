<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\GoodsReceiptLine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<GoodsReceiptLine> */
class GoodsReceiptLineFactory extends Factory
{
    protected $model = GoodsReceiptLine::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
