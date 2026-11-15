<?php

declare(strict_types=1);

namespace App\Filament\Employee\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\LeaveRequest;
use App\Filament\Employee\Resources\LeaveRequestResource\Pages;

class LeaveRequestResource extends GarmentResource
{
    protected static ?string $model = LeaveRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Human Resources';

    protected static ?string $moduleKey = 'hr';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLeaveRequest::route('/'),
            'create' => Pages\CreateLeaveRequest::route('/create'),
            'edit' => Pages\EditLeaveRequest::route('/{record}/edit'),
        ];
    }
}
