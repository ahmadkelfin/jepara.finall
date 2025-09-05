<?php

namespace App\Filament\Admin\Resources\DokumenResource\Pages;

use App\Filament\Admin\Resources\DokumenResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateDokumen extends CreateRecord
{
    protected static string $resource = DokumenResource::class;

    /**
     * Redirect setelah sukses tambah dokumen
     */
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    /**
     * Notifikasi sukses
     */
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Dokumen berhasil ditambahkan')
            ->success();
    }

    public function getTitle(): string
    {
        return 'Tambah Dokumen';
    }
}
