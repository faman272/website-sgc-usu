<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class CustomerChart extends ChartWidget
{
    protected static ?string $heading = 'Total Pelanggan';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $customers = Customer::all();

        // Get customer by created_at
        $customerCounts = $customers->groupBy(function ($customer) {
            return Carbon::parse($customer->created_at)->format('m');
        })->map->count();

        // Initialize counts for all months to 0
        $countsByMonth = array_fill_keys(range(1, 12), 0);

        // Update counts for months that have customers
        foreach ($customerCounts as $month => $count) {
            $countsByMonth[intval($month)] = $count;
        }

        return [
            'labels' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            'datasets' => [
                [
                    'label' => 'Pelanggan',
                    'data' => array_values($countsByMonth),
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
