<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ContactMessageResource\Pages;

use App\Filament\Admin\Resources\ContactMessageResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateContactMessage extends CreatesGarmentRecord
{
    protected static string $resource = ContactMessageResource::class;
}
