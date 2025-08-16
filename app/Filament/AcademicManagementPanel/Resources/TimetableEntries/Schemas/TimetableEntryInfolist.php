<?php

namespace App\Filament\AcademicManagementPanel\Resources\TimetableEntries\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TimetableEntryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Class + Subject
               TextEntry::make('classSubject')
    ->label('Class - Subject')
    ->formatStateUsing(fn($record) =>
        ($record->classSubject?->schoolClass?->name ?? 'Unknown Class')
        . ' - ' .
        ($record->classSubject?->subject?->name ?? 'Unknown Subject')
    ),

                // Staff
                TextEntry::make('staff')
                    ->label('Staff')
                    ->formatStateUsing(fn($record) =>
                        trim(($record->staff?->first_name ?? '') . ' ' . ($record->staff?->last_name ?? ''))
                    ),

                TextEntry::make('day_of_week')->label('Day'),

                TextEntry::make('bellSchedule.name')
                    ->label('Bell Schedule'),

                TextEntry::make('period')
                    ->label('Period'),

                TextEntry::make('room.name')
                    ->label('Room'),

                TextEntry::make('created_at')
                    ->dateTime()
                    ->label('Created'),

                TextEntry::make('updated_at')
                    ->dateTime()
                    ->label('Updated'),
            ]);
    }
}

