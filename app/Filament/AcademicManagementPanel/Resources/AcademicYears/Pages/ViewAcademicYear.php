<?php

namespace App\Filament\AcademicManagementPanel\Resources\AcademicYears\Pages;

use App\Filament\AcademicManagementPanel\Resources\AcademicYears\AcademicYearResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAcademicYear extends ViewRecord
{
    protected static string $resource = AcademicYearResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
