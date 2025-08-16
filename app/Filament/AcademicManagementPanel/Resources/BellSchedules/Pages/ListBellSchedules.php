<?php

namespace App\Filament\AcademicManagementPanel\Resources\BellSchedules\Pages;

use App\Filament\AcademicManagementPanel\Resources\BellSchedules\BellScheduleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBellSchedules extends ListRecords
{
    protected static string $resource = BellScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
