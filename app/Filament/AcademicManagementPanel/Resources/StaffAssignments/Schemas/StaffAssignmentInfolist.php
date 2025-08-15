<?php

namespace App\Filament\AcademicManagementPanel\Resources\StaffAssignments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StaffAssignmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('staff.name')
                    ->label('Staff Name'),
                TextEntry::make('role.name')
                    ->label('Role'),
                TextEntry::make('grade.name')
                    ->label('Grade'),
                TextEntry::make('subject.name')
                    ->label('Subject'),
                TextEntry::make('academicYear.name')
                    ->label('Academic Year'),
            ]);
    }
}

