<?php

namespace App\Filament\AcademicManagementPanel\Resources\StaffRoles\Pages;

use App\Filament\AcademicManagementPanel\Resources\StaffRoles\StaffRoleResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewStaffRole extends ViewRecord
{
    protected static string $resource = StaffRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
