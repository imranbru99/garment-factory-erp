<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\MeasurementAudit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<MeasurementAudit> */
class MeasurementAuditFactory extends Factory
{
    protected $model = MeasurementAudit::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
