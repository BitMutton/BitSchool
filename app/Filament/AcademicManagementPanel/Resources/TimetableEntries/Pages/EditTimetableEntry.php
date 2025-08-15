<?php

namespace App\Filament\AcademicManagementPanel\Resources\TimetableEntries\Pages;

use App\Filament\AcademicManagementPanel\Resources\TimetableEntries\TimetableEntryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTimetableEntry extends EditRecord
{
    protected static string $resource = TimetableEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
