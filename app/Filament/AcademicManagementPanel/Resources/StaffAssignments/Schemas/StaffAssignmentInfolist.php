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
                TextEntry::make('staff_id')
                    ->numeric(),
                TextEntry::make('role_id')
                    ->numeric(),
                TextEntry::make('grade_id')
                    ->numeric(),
                TextEntry::make('subject_id')
                    ->numeric(),
                TextEntry::make('academic_year_id')
                    ->numeric(),
            ]);
    }
}
