<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ExportBill;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<ExportBill> */
class ExportBillFactory extends Factory
{
    protected $model = ExportBill::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
