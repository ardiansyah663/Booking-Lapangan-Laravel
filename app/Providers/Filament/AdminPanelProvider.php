<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Filament\Navigation\NavigationGroup;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // Custom widgets untuk dashboard yang lebih informatif
                \App\Filament\Widgets\FieldStatsWidget::class,
                \App\Filament\Widgets\DailySummaryWidget::class,
                \App\Filament\Widgets\FieldCategoryChartWidget::class,
                \App\Filament\Widgets\MonthlyTrendWidget::class,
                \App\Filament\Widgets\PopularFieldsWidget::class,
                \App\Filament\Widgets\RecentActivityWidget::class,
                
                // Default widgets
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->brandName('Sistem Booking Lapangan')
            //->brandLogo(asset('images/logo.png'))
            ->favicon(asset('images/favicon.ico'))
            ->darkMode(true)
            ->sidebarCollapsibleOnDesktop()
            ->navigationGroups([
                NavigationGroup::make('Lapangan')
                    ->icon('heroicon-o-building-office-2'),
                NavigationGroup::make('Booking')
                    ->icon('heroicon-o-calendar'),
                NavigationGroup::make('Pengguna')
                    ->icon('heroicon-o-users'),
                NavigationGroup::make('Laporan')
                    ->icon('heroicon-o-chart-bar'),
                NavigationGroup::make('Pengaturan')
                    ->icon('heroicon-o-cog-6-tooth'),
            ]);
    }
}