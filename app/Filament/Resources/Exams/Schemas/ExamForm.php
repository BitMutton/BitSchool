<?php

namespace App\Filament\Resources\Exams\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('academic_year_id')
                    ->relationship('academicYear', 'id')
                    ->required(),
                Select::make('grade_id')
                    ->relationship('grade', 'name')
                    ->required(),
                Select::make('subject_id')
                    ->relationship('subject', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                DatePicker::make('date')
                    ->required(),
            ]);
    }
}
