<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnggotaResource\Pages;
use App\Filament\Resources\AnggotaResource\RelationManagers;
use App\Filament\Resources\AnggotaResource\Widgets\StatsAnggota;
use App\Models\Anggota;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\BadgeColumn;


class AnggotaResource extends Resource
{
    protected static ?string $model = Anggota::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Organisasi';


    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Grid::make(['default' => 2])
                ->schema([
                    Forms\Components\TextInput::make('nim')
                        ->label('NIM')
                        ->required(),
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama')
                        ->required(),
                    Forms\Components\TextInput::make('fakultas')
                        ->label('Fakultas')
                        ->required(),
                    Forms\Components\TextInput::make('prodi')
                        ->label('Program Studi')
                        ->required(),
                ]),
                Forms\Components\Grid::make(['default' => 3])
                        ->schema([
                            Forms\Components\Select::make('jk')
                                ->label('Jenis Kelamin')
                                ->options([
                                    'L' => 'Laki-laki',
                                    'P' => 'Perempuan',
                                ])
                                ->required(),
                            Forms\Components\Select::make('divisi_id')
                                ->label('Divisi')
                                ->relationship('divisi', 'nama')
                                ->required(),
                            Forms\Components\Select::make('amanah_id')
                                ->label('Amanah')
                                ->relationship('amanah', 'nama')
                                ->required(),
                        ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Number Column
                Tables\Columns\TextColumn::make('nim')
                    ->searchable()
                    ->sortable()
                    ->label('NIM'),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable()
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('jk')
                    ->searchable()
                    ->sortable()
                    ->label('Jenis Kelamin'),
                Tables\Columns\TextColumn::make('divisi.nama')
                    ->searchable()
                    ->label('Divisi'),
                BadgeColumn::make('amanah.nama')
                    ->label('Amanah')
                    ->colors([
                        'warning' => fn ($state) => in_array($state, ['Presiden', 'Sekretaris Jenderal', 'Wakil Sekretaris Jenderal', 'Menteri', 'Sekretaris Menteri', 'Bendahara Umum', 'Wakil Bendahara Umum']),
                        'success' => fn ($state) => in_array($state, ['Staff Ahli', 'Staff Muda']),
                    ]),

                // Tables\Columns\TextColumn::make('amanah.nama')
                //     ->searchable()
                //     ->sortable()
                //     ->label('Amanah'),
                Tables\Columns\TextColumn::make('fakultas')
                    ->searchable()
                    ->label('Fakultas'),
                Tables\Columns\TextColumn::make('prodi')
                    ->searchable()
                    ->label('Program Studi'),


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


    public static function getWidgets(): array
    {
        return [
            StatsAnggota::make(),
        ];
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
            'index' => Pages\ListAnggotas::route('/'),
            // 'create' => Pages\CreateAnggota::route('/create'),
            // 'edit' => Pages\EditAnggota::route('/{record}/edit'),
        ];
    }
}
