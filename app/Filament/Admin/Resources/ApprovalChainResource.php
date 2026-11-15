<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\ApprovalChain;
use App\Filament\Admin\Resources\ApprovalChainResource\Pages;

class ApprovalChainResource extends GarmentResource
{
    protected static ?string $model = ApprovalChain::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $moduleKey = 'foundation';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApprovalChain::route('/'),
            'create' => Pages\CreateApprovalChain::route('/create'),
            'edit' => Pages\EditApprovalChain::route('/{record}/edit'),
        ];
    }
}
