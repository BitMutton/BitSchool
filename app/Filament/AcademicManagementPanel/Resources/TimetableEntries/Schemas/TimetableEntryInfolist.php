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
                // Show Class - Subject instead of ID
                TextEntry::make('classSubjectDisplay')
                    ->label('Class - Subject')
                    ->getStateUsing(fn ($record) => 
                        ($record->classSubject->schoolClass->name ?? 'Unknown Class') 
                        . ' - ' 
                        . ($record->classSubject->subject->name ?? 'Unknown Subject')
                    ),

                TextEntry::make('day_of_week'),

                TextEntry::make('bellSchedule.name')
                    ->label('Bell Schedule'),

                TextEntry::make('created_at')
                    ->dateTime(),

                TextEntry::make('updated_at')
                    ->dateTime(),

                TextEntry::make('period'),

                TextEntry::make('room.name')
                    ->label('Room'),

                // Show staff full name instead of ID
                TextEntry::make('staffDisplay')
                    ->label('Staff')
                    ->getStateUsing(fn ($record) => 
                        ($record->staff->first_name ?? '') . ' ' . ($record->staff->last_name ?? '')
                    ),
            ]);
    }
}

