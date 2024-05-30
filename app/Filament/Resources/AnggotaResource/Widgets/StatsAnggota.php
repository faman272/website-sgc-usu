<?php

namespace App\Filament\Resources\AnggotaResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\Anggota;

class StatsAnggota extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Anggota', Anggota::count()),
        ];
    }
}
