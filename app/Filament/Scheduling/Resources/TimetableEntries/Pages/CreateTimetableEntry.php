<?php

namespace App\Filament\Scheduling\Resources\TimetableEntries\Pages;

use App\Filament\Scheduling\Resources\TimetableEntries\TimetableEntryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTimetableEntry extends CreateRecord
{
    protected static string $resource = TimetableEntryResource::class;
}
