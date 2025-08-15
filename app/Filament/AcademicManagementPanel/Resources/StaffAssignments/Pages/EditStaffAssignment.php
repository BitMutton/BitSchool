<?php

namespace App\Filament\AcademicManagementPanel\Resources\StaffAssignments\Pages;

use App\Filament\AcademicManagementPanel\Resources\StaffAssignments\StaffAssignmentResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditStaffAssignment extends EditRecord
{
    protected static string $resource = StaffAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
