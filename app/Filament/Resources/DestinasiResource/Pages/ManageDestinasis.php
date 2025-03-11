<?php

namespace App\Filament\Resources\DestinasiResource\Pages;

use App\Filament\Resources\DestinasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDestinasis extends ManageRecords
{
    protected static string $resource = DestinasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
