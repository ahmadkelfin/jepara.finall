<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SambutanResource\Pages;
use App\Models\Sambutan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SambutanResource extends Resource
{
    protected static ?string $model = Sambutan::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Profil Kota';
    protected static ?string $navigationLabel = 'Sambutan Bupati';
    protected static ?string $modelLabel = 'Sambutan';
    protected static ?string $pluralModelLabel = 'Sambutan Bupati';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul Sambutan')
                    ->placeholder('Contoh: Sambutan Hari Jadi Jepara')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('nama_bupati')
                    ->label('Nama Bupati')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('jabatan')
                    ->label('Jabatan')
                    ->default('Bupati Jepara')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('foto')
                    ->label('Foto Bupati')
                    ->image()
                    ->directory('sambutan')
                    ->maxSize(2048)
                    ->required(),

                Forms\Components\RichEditor::make('isi')
    ->label('Isi Sambutan')
    ->required()
    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->square()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nama_bupati')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([])
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

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSambutans::route('/'),
            'create' => Pages\CreateSambutan::route('/create'),
            'edit' => Pages\EditSambutan::route('/{record}/edit'),
        ];
    }
}
