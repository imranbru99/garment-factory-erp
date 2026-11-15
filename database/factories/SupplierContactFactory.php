<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\SupplierContact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<SupplierContact> */
class SupplierContactFactory extends Factory
{
    protected $model = SupplierContact::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
