<?php

declare(strict_types=1);

namespace App\Filament\Admin\Widgets;

use App\Models\BuyerOrder;
use App\Models\Issue;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FactoryOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Open orders', (string) BuyerOrder::query()->whereNotIn('status', ['closed', 'cancelled'])->count()),
            Stat::make('Open issues', (string) Issue::query()->where('status', '!=', 'closed')->count()),
            Stat::make('Shipped', (string) BuyerOrder::query()->where('status', 'shipped')->count()),
        ];
    }
}
