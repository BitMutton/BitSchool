<?php

namespace App\Filament\AcademicManagementPanel\Resources\ClassModels\Pages;

use App\Filament\AcademicManagementPanel\Resources\ClassModels\ClassModelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClassModels extends ListRecords
{
    protected static string $resource = ClassModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
