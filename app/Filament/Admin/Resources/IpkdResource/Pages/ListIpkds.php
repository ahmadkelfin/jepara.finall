<?php

namespace App\Filament\Admin\Resources\IpkdResource\Pages;

use App\Filament\Admin\Resources\IpkdResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIpkds extends ListRecords
{
    protected static string $resource = IpkdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
