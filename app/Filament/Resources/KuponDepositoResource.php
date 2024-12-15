<?php

namespace App\Filament\Resources;

use App\Filament\Exports\KuponDepositoExporter;
use App\Filament\Resources\KuponDepositoResource\Pages;
use App\Filament\Resources\KuponDepositoResource\RelationManagers;
use App\Models\KuponDeposito;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\ExportAction;


class KuponDepositoResource extends Resource
{
    protected static ?string $model = KuponDeposito::class;


    protected static ?string $navigationIcon = 'heroicon-s-ticket';

    protected static ?string $navigationGroup = 'Undian Deposito';
    
    public static function getNavigationLabel(): string
    {
        return 'Kupon Deposito'; // Ganti dengan title navigasi yang diinginkan
    }

    public function getTitle(): string
    {
        return __('Kupon Deposito');
    }

    public static function getLabel(): string
    {
        return __('Kupon Deposito');
    }

    public static function getPluralLabel(): string
    {
        return __('Kupon Deposito');
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('noid_peserta')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nomor_cif')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_rekening')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_nasabah')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kode_kupon')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_kupon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_nasabah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_cif')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_rekening')
                    ->searchable(),
                Tables\Columns\TextColumn::make('produk')
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
            ])
            ->bulkActions([
                //Tables\Actions\BulkActionGroup::make([//Tables\Actions\DeleteBulkAction::make(),]),
            ])
            ->headerActions([

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
            'index' => Pages\ListKuponDepositos::route('/'),
            //'create' => Pages\CreateKuponDeposito::route('/create'),
            //'edit' => Pages\EditKuponDeposito::route('/{record}/edit'),
        ];
    }
}
