<?php

namespace App\Filament\Scheduling\Resources\BellSchedules\Pages;

use App\Filament\Scheduling\Resources\BellSchedules\BellScheduleResource;
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
