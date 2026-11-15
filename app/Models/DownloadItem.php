<?php

declare(strict_types=1);

namespace App\Models;

use ImranDev\UniversalSlug\Attributes\Slug;
use ImranDev\UniversalSlug\Traits\HasUniversalSlug;

#[Slug(from: 'title', to: 'slug', language: 'bn', skipIfFilled: true)]
class DownloadItem extends GarmentModel
{
    use HasUniversalSlug;
    protected $table = 'download_items';

}
