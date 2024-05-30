<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\OrderResource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;
use App\Models\Order;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget
{

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(OrderResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('no_order')
                    ->searchable()
                    ->label('No Order'),
                Tables\Columns\TextColumn::make('customer.name')
                    ->searchable()
                    ->label('Customer'),

                BadgeColumn::make('status')
                    ->colors([
                        'danger' => 'dibatalkan',
                        'warning' => fn ($state) => in_array($state, ['menunggu pembayaran', 'menunggu konfirmasi']),
                        'info' => 'diproses',
                        'success' => fn ($state) => in_array($state, ['dikrim', 'diterima']),
                    ])
                    ->icons([
                        'heroicon-o-x',
                        'heroicon-m-clock' => 'menunggu konfirmasi',
                        'heroicon-m-banknotes' => 'menunggu pembayaran',
                        'heroicon-m-arrow-path' => 'diproses',
                        'heroicon-o-truck' => 'dikirim',
                        'heroicon-o-check-circle' => 'diterima',
                        'heroicon-o-x-circle' => 'dibatalkan',
                    ]),


                Tables\Columns\TextColumn::make('ongkir')
                    ->label('Ongkir')
                    ->formatStateUsing(function ($state) {
                        return 'Rp' . number_format($state, 0, ',', '.');
                    }),
                Tables\Columns\TextColumn::make('total')
                    ->label('Total')
                    ->formatStateUsing(function ($state) {
                        return 'Rp' . number_format($state, 0, ',', '.');
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Order Date')
                    ->date()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('customer.alamat')
                    ->label('Alamat')
                    ->toggleable(),
            ])
            ->actions([
                Tables\Actions\Action::make('open')
                    ->url(fn (Order $record): string => OrderResource::getUrl('edit', ['record' => $record])),
            ]);
    }
}
