<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ArReceipt;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<ArReceipt> */
class ArReceiptFactory extends Factory
{
    protected $model = ArReceipt::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
