<?php

namespace App\Filament\AcademicManagementPanel\Resources\StaffRoles\Pages;

use App\Filament\AcademicManagementPanel\Resources\StaffRoles\StaffRoleResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditStaffRole extends EditRecord
{
    protected static string $resource = StaffRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
