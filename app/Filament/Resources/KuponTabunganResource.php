<?php

namespace App\Filament\Resources;

use App\Filament\Exports\KuponTabunganExporter;
use App\Filament\Resources\KuponTabunganResource\Pages;
use App\Filament\Resources\KuponTabunganResource\RelationManagers;
use App\Models\KuponTabungan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KuponTabunganResource extends Resource
{
    protected static ?string $model = KuponTabungan::class;

    protected static ?string $navigationIcon = 'heroicon-s-ticket';

    protected static ?string $navigationGroup = 'Undian Tabungan';
    
    public static function getNavigationLabel(): string
    {
        return 'Kupon Tabungan'; // Ganti dengan title navigasi yang diinginkan
    }

    public function getTitle(): string
    {
        return __('Kupon Tabungan');
    }

    public static function getLabel(): string
    {
        return __('Kupon Tabungan');
    }

    public static function getPluralLabel(): string
    {
        return __('Kupon Tabungan');
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
                    //Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                //ExportAction::make()->exporter(KuponKreditExporter::class)
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
            'index' => Pages\ListKuponTabungans::route('/'),
            //'create' => Pages\CreateKuponTabungan::route('/create'),
            //'edit' => Pages\EditKuponTabungan::route('/{record}/edit'),
        ];
    }
}
