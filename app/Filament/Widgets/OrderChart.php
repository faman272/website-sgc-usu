<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class OrderChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pesanan';

    protected static ?int $sort = 1;


    protected function getData(): array
    {
        $orders = Order::all();

        // Get orders by created_at
        $orderCounts = $orders->groupBy(function ($order) {
            return Carbon::parse($order->created_at)->format('m');
        })->map->count();

        // Initialize counts for all months to 0
        $countsByMonth = array_fill_keys(range(1, 12), 0);

        // Update counts for months that have orders
        foreach ($orderCounts as $month => $count) {
            $countsByMonth[intval($month)] = $count;
        }

        return [
            'labels' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            'datasets' => [
                [
                    'label' => 'Pesanan',
                    'data' => array_values($countsByMonth),
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
