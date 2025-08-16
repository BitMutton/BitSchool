<?php

namespace App\Filament\AcademicManagementPanel\Resources\TimetableEntries\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\ClassSubject;
use App\Models\Staff;

class TimetableEntryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Class & Subject
                Select::make('class_subject_id')
                    ->label('Class - Subject')
                    ->options(
                        ClassSubject::with(['schoolClass', 'subject'])
                            ->get()
                            ->mapWithKeys(fn($cs) => [
                                $cs->id => ($cs->schoolClass?->name ?? 'Unknown Class') .
                                    ' - ' . ($cs->subject?->name ?? 'Unknown Subject')
                            ])
                    )
                    ->required(),

                // Staff
                Select::make('staff_id')
                    ->label('Staff')
                    ->options(
                        Staff::all()
                            ->mapWithKeys(fn($s) => [
                                $s->id => trim(($s->first_name ?? '') . ' ' . ($s->last_name ?? ''))
                            ])
                    )
                    ->required(),

                // Day of Week
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

                // Bell Schedule
                Select::make('bell_schedule_id')
                    ->label('Bell Schedule')
                    ->relationship('bellSchedule', 'name'),

                // Period
                TextInput::make('period')
                    ->numeric(),

                // Room
                Select::make('room_id')
                    ->label('Room')
                    ->relationship('room', 'name'),
            ]);
    }
}

