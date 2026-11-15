<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\CmsPage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<CmsPage> */
class CmsPageFactory extends Factory
{
    protected $model = CmsPage::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
