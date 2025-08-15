<?php

namespace App\Filament\AcademicManagementPanel\Resources\ClassModels\Schemas;

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
    ->label('Class Teacher')
    ->options(fn () => \App\Models\Staff::all()->pluck('full_name', 'id'))
    ->nullable()
    ->rules([
        'nullable',
        'unique:classes,class_teacher_id,{{record}}',
    ])
    ->validationMessages([
        'unique' => 'This teacher is already assigned as a class teacher for another class.',
    ]),

            ]);
    }
}

