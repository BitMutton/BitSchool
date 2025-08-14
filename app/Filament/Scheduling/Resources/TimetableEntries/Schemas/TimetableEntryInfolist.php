<?php

namespace App\Filament\Scheduling\Resources\TimetableEntries\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TimetableEntryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('class_subject_id')
                    ->numeric(),
                TextEntry::make('day_of_week'),
                TextEntry::make('start_time')
                    ->time(),
                TextEntry::make('end_time')
                    ->time(),
            ]);
    }
}
