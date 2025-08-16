<?php

namespace App\Filament\AcademicManagementPanel\Resources\ClassSubjects\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\SchoolClass;
use App\Models\Subject;

class ClassSubjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('class_id')
                    ->label('Class')
                    ->relationship('schoolClass', 'name')
                    ->searchable()
                    ->required(),

                Select::make('subject_id')
                    ->label('Subject')
                    ->relationship('subject', 'name')
                    ->searchable()
                    ->required(),

                TextInput::make('remarks')
                    ->label('Remarks')
                    ->maxLength(255)
                    ->placeholder('Optional notes...'),
            ]);
    }
}

