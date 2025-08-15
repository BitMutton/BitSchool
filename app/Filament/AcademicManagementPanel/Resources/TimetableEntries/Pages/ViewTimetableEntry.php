<?php

namespace App\Filament\AcademicManagementPanel\Resources\TimetableEntries\Pages;

use App\Filament\AcademicManagementPanel\Resources\TimetableEntries\TimetableEntryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTimetableEntry extends ViewRecord
{
    protected static string $resource = TimetableEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
