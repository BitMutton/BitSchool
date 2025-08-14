<?php

namespace App\Filament\AcademicManagementPanel\Resources\Subjects\Pages;

use App\Filament\AcademicManagementPanel\Resources\Subjects\SubjectResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSubject extends ViewRecord
{
    protected static string $resource = SubjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
