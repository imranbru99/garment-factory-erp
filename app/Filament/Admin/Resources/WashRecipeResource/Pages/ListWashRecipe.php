<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\WashRecipeResource\Pages;

use App\Filament\Admin\Resources\WashRecipeResource;
use App\Filament\Support\ListsGarmentRecords;

class ListWashRecipe extends ListsGarmentRecords
{
    protected static string $resource = WashRecipeResource::class;
}
