<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CertificateResource\Pages;

use App\Filament\Admin\Resources\CertificateResource;
use App\Filament\Support\EditsGarmentRecord;

class EditCertificate extends EditsGarmentRecord
{
    protected static string $resource = CertificateResource::class;
}
