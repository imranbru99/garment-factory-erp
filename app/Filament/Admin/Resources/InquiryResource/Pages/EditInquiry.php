<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\InquiryResource\Pages;

use App\Filament\Admin\Resources\InquiryResource;
use App\Filament\Support\EditsGarmentRecord;

class EditInquiry extends EditsGarmentRecord
{
    protected static string $resource = InquiryResource::class;
}
