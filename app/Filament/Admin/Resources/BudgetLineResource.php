<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\BudgetLine;
use App\Filament\Admin\Resources\BudgetLineResource\Pages;

class BudgetLineResource extends GarmentResource
{
    protected static ?string $model = BudgetLine::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Accounts';

    protected static ?string $moduleKey = 'accounts';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBudgetLine::route('/'),
            'create' => Pages\CreateBudgetLine::route('/create'),
            'edit' => Pages\EditBudgetLine::route('/{record}/edit'),
        ];
    }
}
