<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\InquiryResource\Pages;

use App\Filament\Admin\Resources\InquiryResource;
use App\Filament\Support\ListsGarmentRecords;

class ListInquiry extends ListsGarmentRecords
{
    protected static string $resource = InquiryResource::class;
}
