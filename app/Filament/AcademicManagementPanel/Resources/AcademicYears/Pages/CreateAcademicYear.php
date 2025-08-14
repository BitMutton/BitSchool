<?php

namespace App\Filament\AcademicManagementPanel\Resources\AcademicYears\Pages;

use App\Filament\AcademicManagementPanel\Resources\AcademicYears\AcademicYearResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAcademicYear extends CreateRecord
{
    protected static string $resource = AcademicYearResource::class;
}
