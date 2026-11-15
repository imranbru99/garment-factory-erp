<?php

use App\Providers\AppServiceProvider;
use App\Providers\Filament\AdminPanelProvider;
use App\Providers\Filament\BuyerPanelProvider;
use App\Providers\Filament\EmployeePanelProvider;
use App\Providers\Filament\FloorPanelProvider;
use App\Providers\Filament\SupplierPanelProvider;

return [
    AppServiceProvider::class,
    AdminPanelProvider::class,
    FloorPanelProvider::class,
    BuyerPanelProvider::class,
    SupplierPanelProvider::class,
    EmployeePanelProvider::class,
];
