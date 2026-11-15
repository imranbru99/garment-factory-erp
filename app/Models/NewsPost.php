<?php

declare(strict_types=1);

namespace App\Models;

use ImranDev\UniversalSlug\Attributes\Slug;
use ImranDev\UniversalSlug\Traits\HasUniversalSlug;

#[Slug(from: 'title', to: 'slug', language: 'bn', skipIfFilled: true)]
class NewsPost extends GarmentModel
{
    use HasUniversalSlug;

    protected $table = 'news_posts';

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

}
