<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\SupplierReturn;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<SupplierReturn> */
class SupplierReturnFactory extends Factory
{
    protected $model = SupplierReturn::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
