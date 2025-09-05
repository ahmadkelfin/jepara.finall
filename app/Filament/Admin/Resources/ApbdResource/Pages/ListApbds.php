<?php

namespace App\Filament\Admin\Resources\ApbdResource\Pages;

use App\Filament\Admin\Resources\ApbdResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApbds extends ListRecords
{
    protected static string $resource = ApbdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
