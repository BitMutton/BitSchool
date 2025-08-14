<?php

namespace App\Filament\AcademicManagementPanel\Resources\ClassSubjects\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ClassSubjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('class.name')
                    ->numeric(),
                TextEntry::make('subject.name')
                    ->numeric(),
                TextEntry::make('teacher.id')
                    ->numeric(),
            ]);
    }
}
