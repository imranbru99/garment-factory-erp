<?php

declare(strict_types=1);

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use ImranDev\FilamentMaster\FilamentMasterPlugin;
use ImranDevBd\AiCatalog\Filament\AiCatalogPlugin;
use ImranDevBd\AiHub\Filament\AiHubPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('Padma Apparel')
            ->colors(['primary' => Color::Amber])
            ->sidebarCollapsibleOnDesktop()
            ->discoverResources(in: app_path('Filament/Admin/Resources'), for: 'App\\Filament\\Admin\\Resources')
            ->discoverPages(in: app_path('Filament/Admin/Pages'), for: 'App\\Filament\\Admin\\Pages')
            ->discoverWidgets(in: app_path('Filament/Admin/Widgets'), for: 'App\\Filament\\Admin\\Widgets')
            ->widgets([AccountWidget::class])
            ->navigationGroups([
                NavigationGroup::make('Administration'),
                NavigationGroup::make('Master Data'),
                NavigationGroup::make('Marketing'),
                NavigationGroup::make('Style & Costing'),
                NavigationGroup::make('Sampling'),
                NavigationGroup::make('Orders'),
                NavigationGroup::make('Commercial'),
                NavigationGroup::make('Procurement'),
                NavigationGroup::make('Inventory'),
                NavigationGroup::make('Laboratory'),
                NavigationGroup::make('Planning'),
                NavigationGroup::make('Cutting'),
                NavigationGroup::make('Embroidery'),
                NavigationGroup::make('Sewing'),
                NavigationGroup::make('Quality'),
                NavigationGroup::make('Wash'),
                NavigationGroup::make('Finishing'),
                NavigationGroup::make('Shipping'),
                NavigationGroup::make('Maintenance'),
                NavigationGroup::make('Human Resources'),
                NavigationGroup::make('Compliance'),
                NavigationGroup::make('Accounts'),
                NavigationGroup::make('Issues'),
                NavigationGroup::make('Communication'),
                NavigationGroup::make('Website'),
            ])
            ->plugins([
                FilamentMasterPlugin::make(),
                AiCatalogPlugin::make(),
                AiHubPlugin::make(),
            ])
            ->middleware($this->webMiddleware())
            ->authMiddleware([Authenticate::class]);
    }

    /** @return list<class-string> */
    protected function webMiddleware(): array
    {
        return [
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            AuthenticateSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            SubstituteBindings::class,
            DisableBladeIconComponents::class,
            DispatchServingFilamentEvent::class,
        ];
    }
}
