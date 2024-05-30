<?php

namespace App\Filament\Resources\AmanahResource\Pages;

use App\Filament\Resources\AmanahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAmanah extends EditRecord
{
    protected static string $resource = AmanahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
