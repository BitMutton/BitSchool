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
                    ->label('Class - Subject')
                    ->relationship(
                        name: 'classSubject',
                        titleAttribute: 'id' // required, overridden below
                    )
                    ->getOptionLabelFromRecordUsing(fn($record) =>
                        ($record->schoolClass?->name ?? 'Unknown Class') . ' - ' . ($record->subject?->name ?? 'Unknown Subject')
                    )
                    ->required(),

                Select::make('staff_id')
                    ->label('Staff')
                    ->relationship(
                        name: 'staff',
                        titleAttribute: 'id'
                    )
                    ->getOptionLabelFromRecordUsing(fn($record) =>
                        trim(($record->first_name ?? '') . ' ' . ($record->last_name ?? ''))
                    )
                    ->required(),

                Select::make('day_of_week')
                    ->label('Day of Week')
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
                    ->relationship('bellSchedule', 'name'),

                TextInput::make('period')
                    ->label('Period')
                    ->numeric(),

                Select::make('room_id')
                    ->label('Room')
                    ->relationship('room', 'name'),
            ]);
    }
}

