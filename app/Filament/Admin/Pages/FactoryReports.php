<?php

declare(strict_types=1);

namespace App\Filament\Admin\Pages;

use App\Services\Reports\ReportService;
use Filament\Pages\Page;

class FactoryReports extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static string $view = 'filament.admin.reports';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $title = 'Factory reports';

    /** @return array<string, mixed> */
    protected function getViewData(): array
    {
        return ['kpis' => app(ReportService::class)->snapshot()];
    }
}
