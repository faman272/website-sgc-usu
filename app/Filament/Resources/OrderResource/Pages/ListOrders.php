<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrderStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Resources\Components\Tab;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderWidgets(): array {
        return [
            OrderStats::make(),
        ];
    }

    // Tabs to filter orders by status
    public function getTabs(): array
    {
        return [
            null => Tab::make('Semua'),
            'menunggu konfirmasi' => Tab::make()->query(fn ($query) => $query->where('status', 'menunggu konfirmasi')),
            'menunggu pembayaran' => Tab::make()->query(fn ($query) => $query->where('status', 'menunggu pembayaran')),
            'diproses' => Tab::make()->query(fn ($query) => $query->where('status', 'diproses')),
            'dikirim' => Tab::make()->query(fn ($query) => $query->where('status', 'dikirim')),
            'dibatalkan' => Tab::make()->query(fn ($query) => $query->where('status', 'dibatalkan')),
            
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
