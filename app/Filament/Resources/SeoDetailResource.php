<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeoDetailResource\Pages;
use App\Filament\Resources\SeoDetailResource\RelationManagers;
use App\Models\SeoDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeoDetailResource extends Resource
{
    protected static ?string $model = SeoDetail::class;

        protected static ?string $navigationIcon = 'heroicon-o-newspaper';


    protected static ?string $navigationGroup = 'Blog';


    public static function form(Form $form): Form
    {
        return $form
            ->schema(SeoDetail::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->striped()
            ->columns([
                Tables\Columns\TextColumn::make('post.title')
                    ->limit(20),
                Tables\Columns\TextColumn::make('title')
                    ->limit(20)
                    ->searchable(),
                Tables\Columns\TextColumn::make('keywords')->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('id', 'desc')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSeoDetails::route('/'),
            'create' => Pages\CreateSeoDetail::route('/create'),
            'edit' => Pages\EditSeoDetail::route('/{record}/edit'),
        ];
    }
}
