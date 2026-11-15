<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\StoredDocument;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<StoredDocument> */
class StoredDocumentFactory extends Factory
{
    protected $model = StoredDocument::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'name' => fake()->words(3, true),
        ];
    }
}
