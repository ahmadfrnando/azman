<?php

namespace App\Filament\Resources\PesananPenginapanResource\Pages;

use App\Filament\Resources\PesananPenginapanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPesananPenginapan extends EditRecord
{
    protected static string $resource = PesananPenginapanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
