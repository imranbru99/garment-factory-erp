<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BudgetLineResource\Pages;

use App\Filament\Admin\Resources\BudgetLineResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateBudgetLine extends CreatesGarmentRecord
{
    protected static string $resource = BudgetLineResource::class;
}
