<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\OperationBulletin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<OperationBulletin> */
class OperationBulletinFactory extends Factory
{
    protected $model = OperationBulletin::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
