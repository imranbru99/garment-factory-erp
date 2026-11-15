<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ApBill;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<ApBill> */
class ApBillFactory extends Factory
{
    protected $model = ApBill::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
