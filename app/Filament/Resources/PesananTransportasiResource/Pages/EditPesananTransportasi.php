<?php

namespace App\Filament\Resources\PesananTransportasiResource\Pages;

use App\Filament\Resources\PesananTransportasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPesananTransportasi extends EditRecord
{
    protected static string $resource = PesananTransportasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
