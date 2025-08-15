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
                TextEntry::make('classSubject.id')
                    ->numeric(),
                TextEntry::make('day_of_week'),
                TextEntry::make('bellSchedule.name')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
                TextEntry::make('period')
                    ->numeric(),
                TextEntry::make('room.name')
                    ->numeric(),
            ]);
    }
}
