<?php

namespace App\Filament\Admin\Resources\LayananResource\Pages;

use App\Filament\Admin\Resources\LayananResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateLayanan extends CreateRecord
{
    protected static string $resource = LayananResource::class;

    // Custom judul halaman
    protected static ?string $title = 'Tambah Layanan';

    // Arahkan ke index setelah create
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // Tambahkan notifikasi sukses
    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Data berhasil ditambahkan')
            ->success()
            ->send();
    }
}
