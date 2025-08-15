<?php

namespace App\Filament\AcademicManagementPanel\Resources\StaffRoles\Pages;

use App\Filament\AcademicManagementPanel\Resources\StaffRoles\StaffRoleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStaffRoles extends ListRecords
{
    protected static string $resource = StaffRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
