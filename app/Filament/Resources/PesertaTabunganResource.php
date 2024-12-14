<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesertaTabunganResource\Pages;
use App\Filament\Resources\PesertaTabunganResource\RelationManagers;
use App\Models\PesertaTabungan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Checkbox;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Filament\Imports\PesertaTabunganImporter;
use Filament\Tables\Actions\ImportAction;

class PesertaTabunganResource extends Resource
{
    protected static ?string $model = PesertaTabungan::class;

    protected static ?string $navigationIcon = 'heroicon-c-user-group';

    protected static ?string $navigationGroup = 'Undian Tabungan';
    
    public static function getNavigationLabel(): string
    {
        return 'Peserta Tabungan'; // Ganti dengan title navigasi yang diinginkan
    }

    public function getTitle(): string
    {
        return __('Peserta Tabungan');
    }

    public static function getLabel(): string
    {
        return __('Peserta Tabungan');
    }

    public static function getPluralLabel(): string
    {
        return __('Peserta Tabungan');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_nasabah')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_cif')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_rekening')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenis_tabungan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('saldo_akhir')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('no_ktp')
                    ->required()
                    ->maxLength(16),
                Forms\Components\Textarea::make('alamat')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                ImportAction::make()
                    ->importer(PesertaTabunganImporter::class)
                    ->csvDelimiter(';')
                    ->options([
                        'updateExisting' => true,
                    ])
            ])
            ->columns([
                Tables\Columns\TextColumn::make('nama_nasabah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_cif')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_rekening')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_tabungan')
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
            'index' => Pages\ListPesertaTabungans::route('/'),
            //'create' => Pages\CreatePesertaTabungan::route('/create'),
            //'edit' => Pages\EditPesertaTabungan::route('/{record}/edit'),
        ];
    }
}
