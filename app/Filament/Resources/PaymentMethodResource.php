<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentMethodResource\Pages;
use App\Filament\Resources\PaymentMethodResource\RelationManagers;
use App\Models\PaymentMethod;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;



class PaymentMethodResource extends Resource
{
    protected static ?string $model = PaymentMethod::class;

    // Icon Payment
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationGroup = 'Shop';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode')
                    ->label('Kode')
                    ->placeholder('SGC-')
                    ->maxLength(15)
                    ->required(),
                Forms\Components\TextInput::make('nama_metode')
                    ->label('Nama')
                    ->required(),
                Forms\Components\TextInput::make('norek')
                    ->label('No. Rekening')
                    ->required(),
                Forms\Components\TextInput::make('atas_nama')
                    ->label('Atas Nama')
                    ->required(),
                Forms\Components\FileUpload::make('gambar')
                    ->label('Gambar')
                    ->preserveFilenames()
                    ->directory('metode-pembayaran')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp . '-');
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode')
                    ->label('Kode'),
                TextColumn::make('nama_metode')
                    ->label('Nama'),
                TextColumn::make('norek')
                    ->label('No. Rekening'),
                TextColumn::make('atas_nama')
                    ->label('Atas Nama'),
                ImageColumn::make('gambar')
                    ->disk('public')
                    ->width(120)
                    ->height(120)
                    ->square(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaymentMethods::route('/'),
            // 'create' => Pages\CreatePaymentMethod::route('/create'),
            // 'edit' => Pages\EditPaymentMethod::route('/{record}/edit'),
        ];
    }
}
