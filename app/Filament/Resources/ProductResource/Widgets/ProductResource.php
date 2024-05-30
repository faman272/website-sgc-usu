<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProductResource extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // Total Product
            Stat::make('Total Product', \App\Models\Product::count()),
            // Total Product with Stock > 0
            Stat::make('Product stok lebih dari 0', \App\Models\Product::where('stok', '>', 0)->count()),
            // Total Product with Stock = 0
            Stat::make('Product dengan stok 0', \App\Models\Product::where('stok', 0)->count()),
        ];
    }
}
