<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Modules\SiteStats\Widgets\ReferrersWidget;
use Modules\SiteStats\Widgets\VisitorsWidget;
use Modules\SiteStats\Widgets\BrowserLanguageWidget;
use Modules\SiteStats\Widgets\ContentWidget;
use Modules\SiteStats\Widgets\OnlineUsersChart;

class SiteStatsDashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationLabel = 'Site Stats';
    protected static ?string $slug = 'site-stats';
    protected static ?int $navigationSort = 1;

    protected function getHeaderWidgets(): array
    {
        return [
            ReferrersWidget::class,
            VisitorsWidget::class,
            BrowserLanguageWidget::class,
            ContentWidget::class,
            OnlineUsersChart::class
        ];
    }
}
