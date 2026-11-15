<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\CmsPage;

class CmsPagePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return CmsPage::class;
    }

    protected function module(): string
    {
        return 'website';
    }
}
