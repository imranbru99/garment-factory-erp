<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\InquiryResource\Pages;

use App\Filament\Admin\Resources\InquiryResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateInquiry extends CreatesGarmentRecord
{
    protected static string $resource = InquiryResource::class;
}
