<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentRelationManager extends RelationManager
{
    protected static string $relationship = 'payment';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('no_pembayaran')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('bukti_pembayaran')
                    ->label('Bukti Pembayaran')
                    ->preserveFilenames()
                    ->columnSpanFull()
                    ->directory('bukti-pembayaran')
                    ->getUploadedFileNameForStorageUsing(function ($file) {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp . '-');
                    }),    
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('no_pembayaran')
            ->columns([
                Tables\Columns\TextColumn::make('no_pembayaran'),
                Tables\Columns\TextColumn::make('paymentMethod.nama_metode')
                    ->label('Metode Pembayaran'),
                Tables\Columns\TextColumn::make('paymentMethod.norek')
                    ->label('No. Rekening'),    
                Tables\Columns\TextColumn::make('total_pembayaran')
                    ->formatStateUsing(function ($state) {
                        return 'Rp. ' . number_format($state, 0, ',', '.');
                    })
                    ->label('Total'),
                 Tables\Columns\ImageColumn::make('bukti_pembayaran')
                    ->label('Bukti Pembayaran')
                    ->square()
                    ->width('140px')
                    ->height('150px')
                    ->disk('public')
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
