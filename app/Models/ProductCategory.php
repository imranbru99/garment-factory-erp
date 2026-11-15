<?php

declare(strict_types=1);

namespace App\Models;

use ImranDev\UniversalSlug\Attributes\Slug;
use ImranDev\UniversalSlug\Traits\HasUniversalSlug;

#[Slug(from: 'name', to: 'slug', language: 'bn', skipIfFilled: true)]
class ProductCategory extends GarmentModel
{
    use HasUniversalSlug;

    protected $table = 'product_categories';

    protected function casts(): array
    {
        return [
            'moq' => 'integer',
            'lead_days' => 'integer',
            'is_published' => 'boolean',
        ];
    }

}
