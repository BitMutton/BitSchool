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
                // Staff dropdown using options (custom full name)
                Select::make('staff_id')
                    ->label('Staff')
                    ->options(function () {
                        return Staff::all()->mapWithKeys(fn($staff) => [
                            $staff->id => $staff->first_name . ' ' . $staff->last_name
                        ])->toArray();
                    })
                    ->searchable()
                    ->required(),

                // Role dropdown using relationship
                Select::make('role_id')
                    ->label('Role')
                    ->relationship('role', 'name')
                    ->required(),

                // Grade dropdown
                Select::make('grade_id')
                    ->label('Grade')
                    ->relationship('grade', 'name')
                    ->nullable(),

                // Subject dropdown
                Select::make('subject_id')
                    ->label('Subject')
                    ->relationship('subject', 'name')
                    ->nullable(),

                // Academic Year dropdown using accessor
                Select::make('academic_year_id')
                    ->label('Academic Year')
                    ->options(function () {
                        return AcademicYear::all()
                            ->pluck('display_name', 'id')
                            ->toArray(); // ensure array
                    })
                    ->required(),
            ]);
    }
}

