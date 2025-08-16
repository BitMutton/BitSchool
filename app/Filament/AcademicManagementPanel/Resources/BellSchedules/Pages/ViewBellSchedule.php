<?php

namespace App\Filament\AcademicManagementPanel\Resources\BellSchedules\Pages;

use App\Filament\AcademicManagementPanel\Resources\BellSchedules\BellScheduleResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBellSchedule extends ViewRecord
{
    protected static string $resource = BellScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
