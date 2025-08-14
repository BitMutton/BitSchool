<?php

namespace App\Filament\AcademicManagementPanel\Resources\Grades\Pages;

use App\Filament\AcademicManagementPanel\Resources\Grades\GradeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGrades extends ListRecords
{
    protected static string $resource = GradeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
