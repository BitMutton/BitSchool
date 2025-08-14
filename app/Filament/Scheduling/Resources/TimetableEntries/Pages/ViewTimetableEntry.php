<?php

namespace App\Filament\Scheduling\Resources\TimetableEntries\Pages;

use App\Filament\Scheduling\Resources\TimetableEntries\TimetableEntryResource;
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
