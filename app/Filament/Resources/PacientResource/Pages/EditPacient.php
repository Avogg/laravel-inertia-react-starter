<?php

namespace App\Filament\Resources\PacientResource\Pages;

use App\Filament\Resources\PacientResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPacient extends EditRecord
{
    protected static string $resource = PacientResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
