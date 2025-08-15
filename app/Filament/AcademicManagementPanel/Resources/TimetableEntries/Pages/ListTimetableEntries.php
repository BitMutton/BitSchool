<?php

namespace App\Filament\AcademicManagementPanel\Resources\TimetableEntries\Pages;

use App\Filament\AcademicManagementPanel\Resources\TimetableEntries\TimetableEntryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTimetableEntries extends ListRecords
{
    protected static string $resource = TimetableEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
