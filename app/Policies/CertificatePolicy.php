<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Certificate;

class CertificatePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Certificate::class;
    }

    protected function module(): string
    {
        return 'compliance';
    }
}
