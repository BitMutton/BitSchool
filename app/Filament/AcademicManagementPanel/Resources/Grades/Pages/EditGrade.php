<?php

namespace App\Filament\AcademicManagementPanel\Resources\Grades\Pages;

use App\Filament\AcademicManagementPanel\Resources\Grades\GradeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditGrade extends EditRecord
{
    protected static string $resource = GradeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
