<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

use App\Models\Order;
use App\Models\Customer;

class StatsOverviewWidget extends BaseWidget
{
    use InteractsWithPageFilters;

    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        // Get revenue from order status diproses, dikirim, diterima
        $revenue = Order::where('status', 'diproses', Carbon::now()->subMonth())->sum('total');
        $newCustomers = Customer::where('created_at', '>=', Carbon::now()->subMonth())->count();
        $newOrders = Order::where('created_at', '>=', Carbon::now()->subMonth())->count();

        $formatNumber = fn ($number) => Number::format($number);

        $revenueIncrease = $revenue > 10000; // contoh logika untuk peningkatan pendapatan
        $customerIncrease = $newCustomers > 1; // contoh logika untuk peningkatan pelanggan
        $orderIncrease = $newOrders > 1; // contoh logika untuk peningkatan pesanan

        return [
            Stat::make('Pendapatan', 'Rp' . $formatNumber($revenue))
                ->description($revenueIncrease ? 'Pendapatan meningkat bulan ini' : 'Pendapatan menurun bulan ini')
                ->descriptionIcon($revenueIncrease ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->chart($revenueIncrease ? [1000000, 2000000, 3000000, 4000000, 5000000, 6000000, 7000000] : [7000000, 6000000, 5000000, 4000000, 3000000, 2000000, 1000000])
                ->color($revenueIncrease ? 'success' : 'danger'),

            Stat::make('Pelanggan Baru', $formatNumber($newCustomers))
                ->description($customerIncrease ? 'Jumlah pelanggan baru meningkat bulan ini' : 'Jumlah pelanggan baru menurun bulan ini')
                ->descriptionIcon($customerIncrease ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->chart($customerIncrease ? [17, 16, 14, 15, 14, 13, 12] : [12, 13, 14, 15, 14, 16, 17])
                ->color($customerIncrease ? 'success' : 'danger'),

            Stat::make('Pesanan Baru', $formatNumber($newOrders))
                ->description($orderIncrease ? 'Jumlah pesanan baru meningkat bulan ini' : 'Jumlah pesanan baru menurun bulan ini')
                ->descriptionIcon($orderIncrease ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->chart($orderIncrease ? [15, 4, 10, 2, 12, 4, 12] : [12, 4, 12, 2, 10, 4, 15])
                ->color($orderIncrease ? 'success' : 'danger'),
        ];
    }
}
