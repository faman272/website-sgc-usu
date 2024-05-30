<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminRoleResource\Pages;
use App\Filament\Resources\AdminRoleResource\RelationManagers;
use App\Models\ModelRoles;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminRoleResource extends Resource
{
    protected static ?string $model = ModelRoles::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-exclamation';

    protected static ?string $navigationGroup = 'Role Management';




    public static function form(Form $form): Form
    {
        // Ambil semua users dari database
        $users = User::all();

        // Buat array untuk options
        $options = [];
        foreach ($users as $user) {
            // Gunakan id sebagai key dan nama sebagai value
            $options[$user->id] = $user->name;
        }

        return $form
            ->schema([
                Forms\Components\Select::make('model_id')
                    ->label('Choose User')
                    ->options($options)
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\Select::make('role_id')
                    ->label('Role')
                    ->relationship('role', 'name')
                    ->required(),
                Forms\Components\Select::make('model_type')
                    ->label('Model Type')
                    ->options([
                        'App\Models\User' => 'Admin',
                    ])
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('role.name')
                    ->badge()
                    ->label('Role Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('model_type')
                    ->searchable(),

                // Get name user from model_id and from user id
                Tables\Columns\TextColumn::make('model_id')
                    ->formatStateUsing(function ($state) {
                        return User::find($state)->name;
                    })
                    ->label('User Name')
                    ->searchable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdminRoles::route('/'),
            'create' => Pages\CreateAdminRole::route('/create'),
            'edit' => Pages\EditAdminRole::route('/{record}/edit'),
        ];
    }
}
