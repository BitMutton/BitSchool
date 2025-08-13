<?php

namespace App\Filament\Resources\Exams\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ExamInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('academicYear.id')
                    ->numeric(),
                TextEntry::make('grade.name')
                    ->numeric(),
                TextEntry::make('subject.name')
                    ->numeric(),
                TextEntry::make('name'),
                TextEntry::make('date')
                    ->date(),
            ]);
    }
}
