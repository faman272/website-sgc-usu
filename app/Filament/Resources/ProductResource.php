<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    protected static ?string $navigationGroup = 'Shop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Set $set, $state) {
                        $set('slug', Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('harga')
                    ->label('Harga')
                    ->required(),
                Forms\Components\TextInput::make('harga_diskon')
                    ->label('Harga Diskon'),
                Forms\Components\TextInput::make('berat')
                    ->label('Berat')
                    ->required(),
                Forms\Components\TextInput::make('stok')
                    ->label('Stok')
                    ->required(),
                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->columnSpanFull()
                    ->required(),

                Forms\Components\FileUpload::make('gambar')
                    ->label('Gambar')
                    ->columnSpanFull()
                    ->preserveFilenames()
                    ->directory('product-image')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp . '-');
                    }),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
                //WIDTH AND HEIGHT IMAGE 400x400 
                ImageColumn::make('gambar')
                    ->disk('public')
                    ->width(120)
                    ->height(120)
                    ->square(),
                TextColumn::make('harga')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        return 'Rp' . number_format($state, 0, ',', '.');
                    }),
                TextColumn::make('harga_diskon')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        return 'Rp' . number_format($state, 0, ',', '.');
                    }),
                TextColumn::make('berat')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        return $state . 'gr';
                    }),
                TextColumn::make('deskripsi')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('stok')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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

    public static function getWidgets(): array
    {
        return [
            ProductResource\Widgets\ProductResource::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            // 'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
