<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ImportDocument;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<ImportDocument> */
class ImportDocumentFactory extends Factory
{
    protected $model = ImportDocument::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
