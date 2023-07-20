<?php

namespace App\Filament\Resources\PacientResource\Pages;

use App\Filament\Resources\PacientResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPacients extends ListRecords
{
    protected static string $resource = PacientResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
