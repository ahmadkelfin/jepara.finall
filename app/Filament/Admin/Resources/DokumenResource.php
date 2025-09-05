<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DokumenResource\Pages;
use App\Models\Dokumen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DokumenResource extends Resource
{
    protected static ?string $model = Dokumen::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Konten Publik';
    protected static ?string $navigationLabel = 'Dokumen';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')
                ->label('Judul Dokumen')
                ->placeholder('Masukkan judul dokumen')
                ->required()
                ->maxLength(255),

            Forms\Components\FileUpload::make('file')
                ->label('Upload Dokumen')
                ->directory('dokumen') // akan tersimpan di storage/app/public/dokumen
                ->visibility('public')
                ->downloadable()
                ->openable()
                ->acceptedFileTypes([
                    'application/pdf',
                    'application/vnd.ms-excel',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Nama Dokumen')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('file')
                    ->label('File')
                    ->formatStateUsing(fn ($state) => basename($state)) // hanya tampilkan nama file
                    ->url(fn ($record) => $record->file ? asset('storage/dokumen/' . $record->file) : null, true)
                    ->openUrlInNewTab(),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Diupload pada')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
{
    return [
        'index' => Pages\ListDokumen::route('/'),
        'create' => Pages\CreateDokumen::route('/create'), // ganti dari CreateHero
        'edit' => Pages\EditDokumen::route('/{record}/edit'),
    ];
}

}
