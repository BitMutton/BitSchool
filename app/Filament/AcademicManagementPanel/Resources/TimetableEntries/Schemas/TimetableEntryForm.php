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
                    ->label('Class Subject')
                    ->relationship('classSubject.subject', 'name')

                    ->searchable()
                    ->placeholder('Select Class Subject')
                    ->required(),

                Select::make('day_of_week')
                    ->label('Day of the Week')
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
                    ->label('Bell Schedule')
                    ->relationship('bellSchedule', 'name')
                    ->searchable()
                    ->placeholder('Select Bell Schedule'),

                TextInput::make('period')
                    ->label('Period')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(12) // assuming a max of 12 periods per day
                    ->required(),

                Select::make('room_id')
                    ->label('Room')
                    ->relationship('room', 'name')
                    ->searchable()
                    ->placeholder('Select Room'),
            ]);
    }
}

