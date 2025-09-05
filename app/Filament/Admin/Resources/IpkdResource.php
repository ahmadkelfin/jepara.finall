<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\IpkdResource\Pages;
use App\Models\Ipkd;
use Filament\Forms;  
use Filament\Forms\Form;  
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class IpkdResource extends Resource
{
    protected static ?string $model = Ipkd::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'IPKD';
    protected static ?string $pluralModelLabel = 'IPKD';
    protected static ?string $slug = 'ipkds';

    // ✅ Tambahkan ini biar sejajar dengan APBD
    protected static ?string $navigationGroup = 'Dokumen Publik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('file')
                    ->label('File IPKD')
                    ->directory('ipkd-files')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')->label('Judul'),
                Tables\Columns\TextColumn::make('file')
                    ->label('File')
                    ->url(fn ($record) => asset('storage/' . $record->file), true)
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListIpkds::route('/'),
            'create' => Pages\CreateIpkd::route('/create'),
            'edit'   => Pages\EditIpkd::route('/{record}/edit'),
        ];
    }
}
