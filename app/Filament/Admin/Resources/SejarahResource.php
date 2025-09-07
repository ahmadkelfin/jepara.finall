<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SejarahResource\Pages;
use App\Filament\Admin\Resources\SejarahResource\RelationManagers;
use App\Models\Sejarah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SejarahResource extends Resource
{
    protected static ?string $model = Sejarah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('judul')
                ->required()
                ->maxLength(255),

            Forms\Components\FileUpload::make('gambar')
                ->directory('sejarah')
                ->image()
                ->maxSize(2048),

            Forms\Components\Textarea::make('isi')
                ->required()
                ->rows(6),

            Forms\Components\TextInput::make('urutan')
                ->numeric()
                ->default(0),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('judul')->searchable()->sortable(),
            Tables\Columns\ImageColumn::make('gambar'),
            Tables\Columns\TextColumn::make('urutan')->sortable(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSejarahs::route('/'),
            'create' => Pages\CreateSejarah::route('/create'),
            'edit' => Pages\EditSejarah::route('/{record}/edit'),
        ];
    }
}
