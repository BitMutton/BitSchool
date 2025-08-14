<?php

namespace App\Filament\AcademicManagementPanel\Resources\ClassModels\Pages;

use App\Filament\AcademicManagementPanel\Resources\ClassModels\ClassModelResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewClassModel extends ViewRecord
{
    protected static string $resource = ClassModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
