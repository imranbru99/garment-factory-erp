<?php

declare(strict_types=1);

namespace App\Providers\Filament;

use App\Providers\Filament\Concerns\BuildsPanel;
use Filament\Panel;
use Filament\PanelProvider;

class EmployeePanelProvider extends PanelProvider
{
    use BuildsPanel;

    public function panel(Panel $panel): Panel
    {
        return $this->basePanel($panel, 'employee', 'me', 'App\\Filament\\Employee\\Resources', app_path('Filament/Employee/Resources'));
    }
}
