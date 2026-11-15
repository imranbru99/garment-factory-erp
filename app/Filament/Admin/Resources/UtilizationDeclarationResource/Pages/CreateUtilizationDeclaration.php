<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\UtilizationDeclarationResource\Pages;

use App\Filament\Admin\Resources\UtilizationDeclarationResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateUtilizationDeclaration extends CreatesGarmentRecord
{
    protected static string $resource = UtilizationDeclarationResource::class;
}
