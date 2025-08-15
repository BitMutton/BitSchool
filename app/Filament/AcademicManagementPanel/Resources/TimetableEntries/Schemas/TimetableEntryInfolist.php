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
                TextEntry::make('classSubjectDisplay')
                    ->label('Class & Subject'),

                TextEntry::make('staff.full_name')
                    ->label('Teacher'),

                TextEntry::make('day_of_week')
                    ->label('Day'),

                TextEntry::make('bellSchedule.name')
                    ->label('Bell Schedule'),

                TextEntry::make('period')
                    ->label('Period'),

                TextEntry::make('room.name')
                    ->label('Room'),

                TextEntry::make('created_at')
                    ->label('Created')
                    ->dateTime(),

                TextEntry::make('updated_at')
                    ->label('Updated')
                    ->dateTime(),
            ]);
    }
}

