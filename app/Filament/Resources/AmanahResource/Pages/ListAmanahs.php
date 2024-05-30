<?php

namespace App\Filament\Resources\AmanahResource\Pages;

use App\Filament\Resources\AmanahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAmanahs extends ListRecords
{
    protected static string $resource = AmanahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
