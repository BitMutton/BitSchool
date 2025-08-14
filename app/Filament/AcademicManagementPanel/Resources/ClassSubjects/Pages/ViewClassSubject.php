<?php

namespace App\Filament\AcademicManagementPanel\Resources\ClassSubjects\Pages;

use App\Filament\AcademicManagementPanel\Resources\ClassSubjects\ClassSubjectResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewClassSubject extends ViewRecord
{
    protected static string $resource = ClassSubjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
