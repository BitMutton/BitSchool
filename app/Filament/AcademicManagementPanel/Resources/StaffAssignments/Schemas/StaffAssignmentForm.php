<?php

namespace App\Filament\AcademicManagementPanel\Resources\StaffAssignments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use App\Models\Staff;
use App\Models\StaffRole;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\AcademicYear;

class StaffAssignmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
              

                Select::make('role_id')
                    ->label('Role')
                    ->options(StaffRole::all()->pluck('name', 'id'))
                    ->required(),

                Select::make('grade_id')
                    ->label('Grade')
                    ->options(Grade::all()->pluck('name', 'id'))
                    ->nullable(),

                Select::make('subject_id')
                    ->label('Subject')
                    ->options(Subject::all()->pluck('name', 'id'))
                    ->nullable(),

               Select::make('staff_id')
    ->label('Staff')
    ->options(
        Staff::all()->mapWithKeys(fn($s) => [
            $s->id => $s->name ?? 'Unknown Staff'
        ])
    )
    ->searchable()
    ->required(),

Select::make('academic_year_id')
    ->label('Academic Year')
    ->options(
        AcademicYear::all()->mapWithKeys(fn($year) => [
            $year->id => ($year->start_year && $year->end_year) 
                        ? "{$year->start_year} - {$year->end_year}" 
                        : 'Unknown Year'
        ])
    )
    ->required(),

            ]);
    }
}

