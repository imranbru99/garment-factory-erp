<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\CommercialInvoice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<CommercialInvoice> */
class CommercialInvoiceFactory extends Factory
{
    protected $model = CommercialInvoice::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
