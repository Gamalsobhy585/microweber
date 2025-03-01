<?php

namespace Modules\SiteStats\Widgets;


use Filament\Widgets\Widget;
use Modules\SiteStats\Models\Geoip;


class VisitorsWidget extends Widget
{
    protected static string $view = 'filament.widgets.visitors';
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    public function getData(): array
    {
        return [
            'geoips' => Geoip::latest()->limit(10)->get(),
        ];
    }
}
