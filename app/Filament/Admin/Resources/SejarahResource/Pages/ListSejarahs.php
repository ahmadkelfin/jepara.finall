<?php

namespace App\Filament\Admin\Resources\SejarahResource\Pages;

use App\Filament\Admin\Resources\SejarahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSejarahs extends ListRecords
{
    protected static string $resource = SejarahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
