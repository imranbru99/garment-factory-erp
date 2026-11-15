<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CertificateResource\Pages;

use App\Filament\Admin\Resources\CertificateResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateCertificate extends CreatesGarmentRecord
{
    protected static string $resource = CertificateResource::class;
}
