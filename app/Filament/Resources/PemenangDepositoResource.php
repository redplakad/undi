<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemenangDepositoResource\Pages;
use App\Filament\Resources\PemenangDepositoResource\RelationManagers;
use App\Models\PemenangDeposito;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PemenangDepositoResource extends Resource
{
    protected static ?string $model = PemenangDeposito::class;

    protected static ?string $navigationIcon = 'heroicon-c-user-circle';

    protected static ?string $navigationGroup = 'Undian Deposito';
    
    public static function getNavigationLabel(): string
    {
        return 'Pemenang Deposito'; // Ganti dengan title navigasi yang diinginkan
    }

    public function getTitle(): string
    {
        return __('Pemenang Deposito');
    }

    public static function getLabel(): string
    {
        return __('Pemenang Deposito');
    }

    public static function getPluralLabel(): string
    {
        return __('Pemenang Deposito');
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_peserta')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('id_hadiah')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('no_kupon')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenis_hadiah')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_hadiah')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_nasabah')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah_kupon')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nomor_cif')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_rekening')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('saldo_akhir')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('no_ktp')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_peserta')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('id_hadiah')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('no_kupon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_hadiah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_hadiah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_nasabah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah_kupon')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nomor_cif')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_rekening')
                    ->searchable(),
                Tables\Columns\TextColumn::make('saldo_akhir')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('no_ktp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
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
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPemenangDepositos::route('/'),
            //'create' => Pages\CreatePemenangDeposito::route('/create'),
            //'edit' => Pages\EditPemenangDeposito::route('/{record}/edit'),
        ];
    }
}
