<?php

namespace App\Filament\Resources;

use App\Enums\OrderStatus;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\RelationManagers\DetailOrdersRelationManager;
use App\Filament\Resources\OrderResource\RelationManagers\PaymentRelationManager;
use App\Filament\Resources\OrderResource\Widgets\OrderStats;
use App\Models\Order;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;




class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Shop';


    // Disable new order button

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('no_order')
                    ->label('No Order')
                    ->disabled(),
                //Select customer
                Forms\Components\Select::make('customer_id')
                    ->label('Customer')
                    ->relationship('customer', 'name')
                    ->disabled(),

                Forms\Components\TextInput::make('ongkir')
                    ->label('Ongkir')
                    ->disabled()
                    ->formatStateUsing(function ($state) {
                        return 'Rp' . number_format($state, 0, ',', '.');
                    }),
                Forms\Components\TextInput::make('total')
                    ->label('Total')
                    ->disabled()
                    ->formatStateUsing(function ($state) {
                        return 'Rp' . number_format($state, 0, ',', '.');
                    }),
                Forms\Components\TextInput::make('metode_pengiriman')
                    ->label('Metode Pengiriman')
                    ->columnSpanFull()
                    ->disabled(),
                Forms\Components\TextInput::make('resi_pengiriman')
                    ->label('Resi')
                    ->columnSpanFull(),
                // Status Static
                Forms\Components\TextInput::make('status')
                    ->label('Status')
                    ->disabled()
                    ->formatStateUsing(function ($state) {
                        return $state;
                    }),

                Forms\Components\ToggleButtons::make('status')
                    ->inline()
                    // Selected value
                    ->options(OrderStatus::class)
                    ->required(),

            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no_order')
                    ->searchable()
                    ->label('No Order'),
                TextColumn::make('customer.name')
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


                TextColumn::make('ongkir')
                    ->label('Ongkir')
                    ->formatStateUsing(function ($state) {
                        return 'Rp' . number_format($state, 0, ',', '.');
                    }),
                TextColumn::make('total')
                    ->label('Total')
                    ->formatStateUsing(function ($state) {
                        return 'Rp' . number_format($state, 0, ',', '.');
                    }),
                TextColumn::make('created_at')
                    ->label('Order Date')
                    ->date()
                    ->toggleable(),
                TextColumn::make('customer.alamat')
                    ->label('Alamat')
                    ->toggleable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            PaymentRelationManager::class,
            DetailOrdersRelationManager::class,
        ];
    }

    // Widget
    public static function getWidgets(): array
    {
        return [
            OrderStats::class,
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        /** @var class-string<Model> $modelClass */
        $modelClass = static::$model;

        return (string) $modelClass::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            // 'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
