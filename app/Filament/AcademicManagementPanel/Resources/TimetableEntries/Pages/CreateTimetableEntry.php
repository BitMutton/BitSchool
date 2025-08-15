<?php

namespace App\Filament\AcademicManagementPanel\Resources\TimetableEntries\Pages;

use App\Filament\AcademicManagementPanel\Resources\TimetableEntries\TimetableEntryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTimetableEntry extends CreateRecord
{
    protected static string $resource = TimetableEntryResource::class;
}
