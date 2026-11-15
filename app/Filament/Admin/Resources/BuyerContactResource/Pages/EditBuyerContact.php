<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BuyerContactResource\Pages;

use App\Filament\Admin\Resources\BuyerContactResource;
use App\Filament\Support\EditsGarmentRecord;

class EditBuyerContact extends EditsGarmentRecord
{
    protected static string $resource = BuyerContactResource::class;
}
