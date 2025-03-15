<?php

namespace App\Filament\Widgets;

use App\Models\Destinasi;
use App\Models\Penginapan;
use App\Models\Transportasi;
use App\Models\Umkm;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Destinasi', Destinasi::count()),
            Stat::make('Total Penginapan', Penginapan::count()),
            Stat::make('Total Transportasi', Transportasi::count()),
            Stat::make('Total UMKM', Umkm::count()),
        ];
    }
}
