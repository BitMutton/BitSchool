<?php

namespace App\Filament\AcademicManagementPanel\Resources\TimetableEntries\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TimetableEntryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('class_subject_id')
                    ->relationship('classSubject', 'id')
                    ->required(),
                Select::make('day_of_week')
                    ->options([
            'Monday' => 'Monday',
            'Tuesday' => 'Tuesday',
            'Wednesday' => 'Wednesday',
            'Thursday' => 'Thursday',
            'Friday' => 'Friday',
            'Saturday' => 'Saturday',
            'Sunday' => 'Sunday',
        ])
                    ->default('Monday')
                    ->required(),
                Select::make('bell_schedule_id')
                    ->relationship('bellSchedule', 'name'),
                TextInput::make('period')
                    ->numeric(),
                Select::make('room_id')
                    ->relationship('room', 'name'),
            ]);
    }
}
