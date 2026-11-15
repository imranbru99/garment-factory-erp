<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BuyerVisitResource\Pages;

use App\Filament\Admin\Resources\BuyerVisitResource;
use App\Filament\Support\EditsGarmentRecord;

class EditBuyerVisit extends EditsGarmentRecord
{
    protected static string $resource = BuyerVisitResource::class;
}
