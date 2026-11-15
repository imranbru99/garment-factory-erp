<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\BondLicense;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<BondLicense> */
class BondLicenseFactory extends Factory
{
    protected $model = BondLicense::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
