<?php

namespace App\Filament\AcademicManagementPanel\Resources\ClassModels\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ClassModelInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('school.name')
                    ->numeric(),
                TextEntry::make('grade.name')
                    ->numeric(),
                TextEntry::make('academicYear.id')
                    ->numeric(),
                TextEntry::make('name'),
                TextEntry::make('classTeacher.id')
                    ->numeric(),
            ]);
    }
}
