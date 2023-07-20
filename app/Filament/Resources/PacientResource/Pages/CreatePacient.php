<?php

namespace App\Filament\Resources\PacientResource\Pages;

use App\Filament\Resources\PacientResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePacient extends CreateRecord
{
    protected static string $resource = PacientResource::class;
}
