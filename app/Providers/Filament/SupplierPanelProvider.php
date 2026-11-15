<?php

declare(strict_types=1);

namespace App\Providers\Filament;

use App\Providers\Filament\Concerns\BuildsPanel;
use Filament\Panel;
use Filament\PanelProvider;

class SupplierPanelProvider extends PanelProvider
{
    use BuildsPanel;

    public function panel(Panel $panel): Panel
    {
        return $this->basePanel($panel, 'supplier', 'supplier', 'App\\Filament\\Supplier\\Resources', app_path('Filament/Supplier/Resources'));
    }
}
