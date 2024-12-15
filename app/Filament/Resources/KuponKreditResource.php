<?php

namespace App\Filament\Resources;

use App\Filament\Exports\KuponKreditExporter;
use App\Filament\Resources\KuponKreditResource\Pages;
use App\Filament\Resources\KuponKreditResource\RelationManagers;
use App\Models\KuponKredit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class KuponKreditResource extends Resource
{
    protected static ?string $model = KuponKredit::class;

    protected static ?string $navigationIcon = 'heroicon-s-ticket';

    protected static ?string $navigationGroup = 'Undian Kredit';
    
    public static function getNavigationLabel(): string
    {
        return 'Kupon Kredit'; // Ganti dengan title navigasi yang diinginkan
    }

    public function getTitle(): string
    {
        return __('Kupon Kredit');
    }

    public static function getLabel(): string
    {
        return __('Kupon Kredit');
    }

    public static function getPluralLabel(): string
    {
        return __('Kupon Kredit');
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
                Forms\Components\TextInput::make('wilayah')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('noid_peserta')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nomor_cif')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_rekening')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_nasabah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode_kupon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('wilayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_kredit')
                    ->searchable(),
                Tables\Columns\TextColumn::make('wilayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
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
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()->exports([
                        ExcelExport::make()->queue()
                    ])
                ]),
            ])
            ->headerActions([
                //ExportAction::make()->exporter(KuponKreditExporter::class)
                ExportAction::make()->exports([
                    ExcelExport::make()->queue()->withChunkSize(100)
                ])
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
            'index' => Pages\ListKuponKredits::route('/'),
            //'create' => Pages\CreateKuponKredit::route('/create'),
            //'edit' => Pages\EditKuponKredit::route('/{record}/edit'),
        ];
    }
}
