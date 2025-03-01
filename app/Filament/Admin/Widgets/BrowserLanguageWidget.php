<?php

namespace Modules\SiteStats\Widgets;

use Filament\Widgets\Widget;
use Modules\SiteStats\Models\Browsers;

class BrowserLanguageWidget extends Widget
{
    protected static string $view = 'filament.widgets.browser-language';
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';

    public function getData(): array
    {
        return [
            'languages' => Browsers::select('language')->groupBy('language')->get(),
        ];
    }
}