<?php

namespace App\Filament\AcademicManagementPanel\Resources\StaffAssignments\Pages;

use App\Filament\AcademicManagementPanel\Resources\StaffAssignments\StaffAssignmentResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewStaffAssignment extends ViewRecord
{
    protected static string $resource = StaffAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
