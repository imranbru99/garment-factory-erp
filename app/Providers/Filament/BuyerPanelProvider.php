<?php

declare(strict_types=1);

namespace App\Providers\Filament;

use App\Providers\Filament\Concerns\BuildsPanel;
use Filament\Panel;
use Filament\PanelProvider;

class BuyerPanelProvider extends PanelProvider
{
    use BuildsPanel;

    public function panel(Panel $panel): Panel
    {
        return $this->basePanel($panel, 'buyer', 'buyer', 'App\\Filament\\Buyer\\Resources', app_path('Filament/Buyer/Resources'));
    }
}
