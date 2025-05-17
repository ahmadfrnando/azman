<?php

namespace App\Filament\Resources\PesanananUmkmResource\Pages;

use App\Filament\Resources\PesanananUmkmResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPesanananUmkm extends EditRecord
{
    protected static string $resource = PesanananUmkmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
