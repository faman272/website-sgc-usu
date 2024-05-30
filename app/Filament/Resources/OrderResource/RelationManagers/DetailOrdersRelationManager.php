<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DetailOrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'detail_orders';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('no_order')
                    ->required()
                    ->maxLength(255),
                // Tambahkan field lainnya yang Anda butuhkan di sini
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('no_order')
            ->columns([
                Tables\Columns\TextColumn::make('product.nama')
                    ->label('Produk'),
                Tables\Columns\TextColumn::make('quantity')
                    ->label('Quantity'),
                Tables\Columns\TextColumn::make('total_berat')
                    ->formatStateUsing(function ($state) {
                        return $state . 'gr';
                    })
                    ->label('Total Berat'),
                Tables\Columns\TextColumn::make('subtotal')
                    ->formatStateUsing(function ($state) {
                        return 'Rp. ' . number_format($state, 0, ',', '.');
                    })
                    ->label('Subtotal'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('open_product')
                    ->icon('heroicon-m-arrow-top-right-on-square')
                    ->tooltip('Open product')
                    ->url(fn ($record) => "/admin/products/{$record->product_id}/edit"),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public function query(): Builder
    {
        return parent::query()->orderBy('no_order');
    }

    public function getDefaultSortColumn(): string
    {
        return 'no_order';
    }
}
