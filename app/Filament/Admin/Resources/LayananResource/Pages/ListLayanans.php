<?php

namespace App\Filament\Admin\Resources\LayananResource\Pages;

use App\Filament\Admin\Resources\LayananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ExportBulkAction;

class ListLayanans extends ListRecords
{
    protected static string $resource = LayananResource::class;

    // Custom judul halaman
    protected static ?string $title = 'Daftar Layanan';

    // Tombol di header (buat data baru + refresh)
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Layanan'),
            Actions\Action::make('refresh')
                ->label('Refresh')
                ->icon('heroicon-o-arrow-path')
                ->action(fn () => $this->refresh()),
        ];
    }

    // Tambah fitur tabel (search, filter, export)
    protected function getTableActions(): array
    {
        return [
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            ExportBulkAction::make(),
            Tables\Actions\DeleteBulkAction::make(),
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            ExportAction::make()
                ->label('Export Data')
                ->exporter(\Filament\Tables\Actions\Exports\Exporter::make()),
        ];
    }
}
