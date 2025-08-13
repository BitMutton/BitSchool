<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('school_id')
                    ->required()
                    ->numeric(),
                TextInput::make('first_name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                DatePicker::make('dob')
                    ->required(),
                TextInput::make('gender')
                    ->required(),
                DatePicker::make('admission_date')
                    ->required(),
                TextInput::make('grade_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
