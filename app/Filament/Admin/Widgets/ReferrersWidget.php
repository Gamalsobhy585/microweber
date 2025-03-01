<?php

namespace Modules\SiteStats\Widgets;

use Filament\Widgets\Widget;
use Modules\SiteStats\Models\Referrers;


class ReferrersWidget extends Widget
{
    protected static string $view = 'filament.widgets.referrers';
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';

    public function getData(): array
    {
        return [
            'referrers' => Referrers::with('domain', 'path')->latest()->limit(10)->get(),
        ];
    }
}
