<?php

namespace App\Filament\Resources\NewsLetterResource\Pages;

use App\Filament\Resources\NewsLetterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNewsLetter extends EditRecord
{
    protected static string $resource = NewsLetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
