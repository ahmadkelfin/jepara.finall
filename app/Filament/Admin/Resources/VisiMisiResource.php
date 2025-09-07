<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\VisiMisiResource\Pages;
use App\Models\VisiMisi;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class VisiMisiResource extends Resource
{
    protected static ?string $model = VisiMisi::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';
    protected static ?string $navigationGroup = 'Profil Kota';
    protected static ?string $navigationLabel = 'Visi & Misi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('visi')
                    ->label('Visi')
                    ->rows(4)
                    ->required(),

                Textarea::make('misi')
                    ->label('Misi')
                    ->rows(6)
                    ->required(),

                FileUpload::make('gambar')
                    ->label('Gambar Pendukung')
                    ->directory('visi-misi')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->downloadable()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('visi')
                    ->label('Visi')
                    ->limit(50),

                TextColumn::make('misi')
                    ->label('Misi')
                    ->limit(50),

                TextColumn::make('gambar')
                    ->label('Gambar')
                    ->formatStateUsing(fn ($state) => $state ? '✅ Ada' : '❌ Kosong'),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime(),

                TextColumn::make('updated_at')
                    ->label('Diupdate')
                    ->since(),
            ])
            ->filters([])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
{
    return [
        'index' => Pages\ListVisiMisis::route('/'),
        'create' => Pages\CreateVisiMisi::route('/create'),
        'edit' => Pages\EditVisiMisi::route('/{record}/edit'),
    ];
}

}
