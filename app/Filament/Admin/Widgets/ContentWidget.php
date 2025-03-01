<?php

namespace Modules\SiteStats\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\DB;
use Modules\SiteStats\Models\ReferrersPaths;

class ContentWidget extends Widget
{
    protected static string $view = 'filament.widgets.content';
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';

    public function getData(): array
    {
        return [
            'paths' => ReferrersPaths::latest()->limit(10)->get(),
        ];
    }
}