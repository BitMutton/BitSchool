<?php

namespace App\Filament\AcademicManagementPanel\Resources\Staff\Pages;

use App\Filament\AcademicManagementPanel\Resources\Staff\StaffResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStaff extends ListRecords
{
    protected static string $resource = StaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
