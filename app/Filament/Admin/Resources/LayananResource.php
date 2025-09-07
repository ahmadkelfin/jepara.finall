<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\LayananResource\Pages;
use App\Models\Layanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LayananResource extends Resource
{
    protected static ?string $model = Layanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Layanans';
    protected static ?string $pluralModelLabel = 'Layanan';
    protected static ?string $modelLabel = 'Layanan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_layanan')
                    ->label('Nama Layanan')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                // Upload gambar ikon
                Forms\Components\FileUpload::make('ikon')
                    ->label('Ikon')
                    ->image()
                    ->directory('layanan-ikon') // simpan di storage/app/public/layanan-ikon
                    ->preserveFilenames()
                    ->imagePreviewHeight('100')
                    ->downloadable()
                    ->openable(),

                Forms\Components\TextInput::make('url')
                    ->label('Link Layanan')
                    ->url()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_layanan')
                    ->label('Nama Layanan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('ikon')
                    ->label('Ikon')
                    ->circular(),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(40),

                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->limit(30)
                    ->url(fn ($record) => $record->url, true),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diubah')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListLayanans::route('/'),
            'create' => Pages\CreateLayanan::route('/create'),
            'edit' => Pages\EditLayanan::route('/{record}/edit'),
        ];
    }
}
