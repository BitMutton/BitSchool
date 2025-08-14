<?php

namespace App\Filament\AcademicManagementPanel\Resources\ClassSubjects\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ClassSubjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('class_id')
                    ->relationship('class', 'name')
                    ->required(),
                Select::make('subject_id')
                    ->relationship('subject', 'name')
                    ->required(),
                Select::make('teacher_id')
                    ->relationship('teacher', 'id')
                    ->required(),
            ]);
    }
}
