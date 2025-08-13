<?php

namespace App\Filament\Resources\ClassModels\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClassModelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('school_id')
                    ->relationship('school', 'name')
                    ->required(),
                Select::make('grade_id')
                    ->relationship('grade', 'name')
                    ->required(),
                Select::make('academic_year_id')
                    ->relationship('academicYear', 'id')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Select::make('class_teacher_id')
                    ->relationship('classTeacher', 'id'),
            ]);
    }
}
