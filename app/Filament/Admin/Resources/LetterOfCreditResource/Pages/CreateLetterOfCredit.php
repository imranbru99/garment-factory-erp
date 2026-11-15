<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LetterOfCreditResource\Pages;

use App\Filament\Admin\Resources\LetterOfCreditResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateLetterOfCredit extends CreatesGarmentRecord
{
    protected static string $resource = LetterOfCreditResource::class;
}
