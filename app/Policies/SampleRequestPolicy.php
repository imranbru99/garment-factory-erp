<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\SampleRequest;

class SampleRequestPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return SampleRequest::class;
    }

    protected function module(): string
    {
        return 'sampling';
    }
}
