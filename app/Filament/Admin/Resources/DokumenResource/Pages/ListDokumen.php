<?php

namespace App\Filament\Admin\Resources\DokumenResource\Pages;

use App\Filament\Admin\Resources\DokumenResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDokumen extends ListRecords
{
    protected static string $resource = DokumenResource::class;

    /**
     * Tambahkan tombol "Create" di halaman list
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Dokumen')
                ->icon('heroicon-o-plus'),
        ];
    }

    /**
     * (Opsional) Ubah judul halaman
     */
    public function getTitle(): string
    {
        return 'Daftar Dokumen';
    }
}
