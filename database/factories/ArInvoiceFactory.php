<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ArInvoice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<ArInvoice> */
class ArInvoiceFactory extends Factory
{
    protected $model = ArInvoice::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
