<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarHadiahResource\Pages;
use App\Filament\Resources\DaftarHadiahResource\RelationManagers;
use App\Models\DaftarHadiah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TagsInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

use App\Models\KuponKredit;

class DaftarHadiahResource extends Resource
{
    protected static ?string $model = DaftarHadiah::class;

    protected static ?string $navigationIcon = 'heroicon-s-gift';
    
    public static function getNavigationLabel(): string
    {
        return 'Daftar Hadiah'; // Ganti dengan title navigasi yang diinginkan
    }

    public function getTitle(): string | Htmlable
    {
        return __('Daftar Hadiah');
    }

    public static function getLabel(): string
    {
        return __('Daftar Hadiah');
    }

    public static function getPluralLabel(): string
    {
        return __('Daftar Hadiah');
    }

    public static function form(Form $form): Form
    {
        $wilayah = KuponKredit::distinct()->pluck('wilayah')->toArray();
        return $form
            ->schema([
                Select::make('level_hadiah')
                    ->options([
                        'utama' => 'Hadiah Utama',
                        'hiburan' => 'Hadiah Hiburan',
                    ])
                    ->label('Level Hadiah'),
                Forms\Components\TextInput::make('nama_hadiah')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('jumlah_hadiah')
                    ->required()
                    ->numeric(),
                FileUpload::make('gambar_hadiah')
                    ->image(),
                TagsInput::make('deskripsi_hadiah')
                    ->suggestions($wilayah)
                    ->placeholder('Tambahkan Wilayah')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('level_hadiah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_hadiah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah_hadiah')
                    ->numeric()
                    ->sortable(),
                ImageColumn::make('gambar_hadiah'),
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
            'index' => Pages\ListDaftarHadiahs::route('/'),
            'create' => Pages\CreateDaftarHadiah::route('/create'),
            'edit' => Pages\EditDaftarHadiah::route('/{record}/edit'),
        ];
    }
}
