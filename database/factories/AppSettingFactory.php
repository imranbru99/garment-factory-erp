<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\AppSetting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<AppSetting> */
class AppSettingFactory extends Factory
{
    protected $model = AppSetting::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
            'setting_key' => fake()->unique()->bothify('??-####'),
        ];
    }
}
