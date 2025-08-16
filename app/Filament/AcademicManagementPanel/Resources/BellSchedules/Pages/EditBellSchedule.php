<?php

namespace App\Filament\AcademicManagementPanel\Resources\BellSchedules\Pages;

use App\Filament\AcademicManagementPanel\Resources\BellSchedules\BellScheduleResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBellSchedule extends EditRecord
{
    protected static string $resource = BellScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
