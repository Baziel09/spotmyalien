<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ReportsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Card::make('Gebruikers', \App\Models\User::count())
                ->url(route('filament.admin.resources.users.index')),
            Card::make('Meldingen', \App\Models\Report::count())
                ->url(route('filament.admin.resources.reports.index')),
        ];
    }
}
