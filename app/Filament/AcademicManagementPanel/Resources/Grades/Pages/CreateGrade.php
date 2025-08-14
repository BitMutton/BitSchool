<?php

namespace App\Filament\AcademicManagementPanel\Resources\Grades\Pages;

use App\Filament\AcademicManagementPanel\Resources\Grades\GradeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGrade extends CreateRecord
{
    protected static string $resource = GradeResource::class;
}
