<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ModuleSetting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<ModuleSetting> */
class ModuleSettingFactory extends Factory
{
    protected $model = ModuleSetting::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
            'module_key' => fake()->unique()->bothify('??-####'),
        ];
    }
}
