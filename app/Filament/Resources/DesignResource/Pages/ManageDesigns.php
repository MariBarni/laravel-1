<?php

namespace App\Filament\Resources\DesignResource\Pages;

use App\Filament\Resources\DesignResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDesigns extends ManageRecords
{
    protected static string $resource = DesignResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
