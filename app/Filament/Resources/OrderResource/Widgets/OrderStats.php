<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Order;

use Flowframe\Trend\TrendValue;
use Flowframe\Trend\Trend;



class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {

        $orderData = Trend::model(Order::class)
            ->between(
                start: now()->subYear(),
                end: now(),
            )
            ->perMonth()
            ->count();

        return [
            Stat::make('Orders', \App\Models\Order::count())
                ->chart(
                    $orderData
                        ->map(fn (TrendValue $value) => $value->aggregate)
                        ->toArray()
                ),
            Stat::make('Menunggu Konfirmasi', \App\Models\Order::where('status', 'Menunggu Konfirmasi')->count()),
            Stat::make('Diproses', \App\Models\Order::where('status', 'Diproses')->count()),
        ];
    }
}
