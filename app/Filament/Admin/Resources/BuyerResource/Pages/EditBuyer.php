<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BuyerResource\Pages;

use App\Filament\Admin\Resources\BuyerResource;
use App\Filament\Support\EditsGarmentRecord;

class EditBuyer extends EditsGarmentRecord
{
    protected static string $resource = BuyerResource::class;
}
