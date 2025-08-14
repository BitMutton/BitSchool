<?php

namespace App\Filament\AcademicManagementPanel\Resources\Schools\Pages;

use App\Filament\AcademicManagementPanel\Resources\Schools\SchoolResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSchool extends EditRecord
{
    protected static string $resource = SchoolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
