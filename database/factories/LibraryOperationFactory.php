<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\LibraryOperation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<LibraryOperation> */
class LibraryOperationFactory extends Factory
{
    protected $model = LibraryOperation::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
