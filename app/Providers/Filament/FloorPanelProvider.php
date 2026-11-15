<?php

declare(strict_types=1);

namespace App\Providers\Filament;

use App\Providers\Filament\Concerns\BuildsPanel;
use Filament\Panel;
use Filament\PanelProvider;

class FloorPanelProvider extends PanelProvider
{
    use BuildsPanel;

    public function panel(Panel $panel): Panel
    {
        return $this->basePanel($panel, 'floor', 'floor', 'App\\Filament\\Floor\\Resources', app_path('Filament/Floor/Resources'));
    }
}
