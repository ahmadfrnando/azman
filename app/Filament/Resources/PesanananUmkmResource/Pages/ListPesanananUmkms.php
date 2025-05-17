<?php

namespace App\Filament\Resources\PesanananUmkmResource\Pages;

use App\Filament\Resources\PesanananUmkmResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPesanananUmkms extends ListRecords
{
    protected static string $resource = PesanananUmkmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
