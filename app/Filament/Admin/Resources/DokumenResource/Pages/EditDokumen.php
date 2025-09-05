<?php

namespace App\Filament\Admin\Resources\DokumenResource\Pages;

use App\Filament\Admin\Resources\DokumenResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditDokumen extends EditRecord
{
    protected static string $resource = DokumenResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Dokumen berhasil diperbarui')
            ->success();
    }

    public function getTitle(): string
    {
        return 'Edit Dokumen';
    }
}
