<?php

namespace App\Filament\Resources\AnggotaResource\Pages;

use App\Filament\Resources\AnggotaResource;
use App\Filament\Resources\AnggotaResource\Widgets\StatsAnggota;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Resources\Components\Tab;

class ListAnggotas extends ListRecords
{
    protected static string $resource = AnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array {
        return [
            StatsAnggota::make(),
        ];
    }

    // Tabs to filter anggota by division
    public function getTabs(): array
    {
        return [
            null => Tab::make('Semua'),
            'BPH' => Tab::make()->query(fn ($query) => $query->where('divisi_id', '1')),
            'PSDM' => Tab::make()->query(fn ($query) => $query->where('divisi_id', '2')),
            'HUB' => Tab::make()->query(fn ($query) => $query->where('divisi_id', '3')),
            'RISTEK' => Tab::make()->query(fn ($query) => $query->where('divisi_id', '4')),
            'PENGMAS' => Tab::make()->query(fn ($query) => $query->where('divisi_id', '5')),
            'JnK' => Tab::make()->query(fn ($query) => $query->where('divisi_id', '6')),
            'USMAN' => Tab::make()->query(fn ($query) => $query->where('divisi_id', '7')),
            'PP' => Tab::make()->query(fn ($query) => $query->where('divisi_id', '8')),
        ];
    }
}
