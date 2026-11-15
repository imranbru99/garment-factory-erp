<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BuyerOrderResource\Pages;

use App\Filament\Admin\Resources\BuyerOrderResource;
use App\Filament\Support\EditsGarmentRecord;

class EditBuyerOrder extends EditsGarmentRecord
{
    protected static string $resource = BuyerOrderResource::class;
}
