<?php

namespace App\Filament\Admin\Resources\LayananResource\Pages;

use App\Filament\Admin\Resources\LayananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditLayanan extends EditRecord
{
    protected static string $resource = LayananResource::class;

    // Custom judul halaman
    protected static ?string $title = 'Edit Layanan';

    // Arahkan ke index setelah update/delete
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // Notifikasi sukses setelah update
    protected function afterSave(): void
    {
        Notification::make()
            ->title('Data berhasil diperbarui')
            ->success()
            ->send();
    }

    // Tombol aksi di header (Delete + custom confirmasi)
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus')
                ->successNotificationTitle('Data berhasil dihapus'),
        ];
    }
}
