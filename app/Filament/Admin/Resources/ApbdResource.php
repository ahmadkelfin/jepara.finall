<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ApbdResource\Pages;
use App\Models\Apbd;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class ApbdResource extends Resource
{
    protected static ?string $model = Apbd::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'APBD';

    protected static ?string $navigationGroup = 'Dokumen Publik';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->label('Judul')
                ->required()
                ->maxLength(255),

            TextInput::make('year')
                ->label('Tahun')
                ->numeric()
                ->required(),

            DatePicker::make('date')
                ->label('Tanggal')
                ->required(),

            FileUpload::make('thumbnail')
                ->label('Thumbnail')
                ->directory('apbd-thumbnails')
                ->image()
                ->nullable(),

            FileUpload::make('file')
                ->label('File APBD')
                ->directory('apbd-files')
                ->acceptedFileTypes(['application/pdf'])
                ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('title')
                ->label('Judul')
                ->searchable(),

            TextColumn::make('year')
                ->label('Tahun')
                ->sortable(),

            ImageColumn::make('thumbnail')
                ->label('Thumbnail'),

            TextColumn::make('date')
                ->label('Tanggal')
                ->date(),
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
            'index' => Pages\ListApbds::route('/'),
            'create' => Pages\CreateApbd::route('/create'),
            'edit' => Pages\EditApbd::route('/{record}/edit'),
        ];
    }
}
