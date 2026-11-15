<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\UtilizationDeclaration;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<UtilizationDeclaration> */
class UtilizationDeclarationFactory extends Factory
{
    protected $model = UtilizationDeclaration::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
