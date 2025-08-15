<?php

namespace App\Filament\AcademicManagementPanel\Resources\StaffAssignments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StaffAssignmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('staff_id')
                    ->required()
                    ->numeric(),
                TextInput::make('role_id')
                    ->required()
                    ->numeric(),
                TextInput::make('grade_id')
                    ->numeric(),
                TextInput::make('subject_id')
                    ->numeric(),
                TextInput::make('academic_year_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
