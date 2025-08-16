<?php

namespace App\Filament\AcademicManagementPanel\Resources\ClassSubjects\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ClassSubjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('schoolClass.name')
                    ->label('Class'),

                TextEntry::make('subject.name')
                    ->label('Subject'),

                TextEntry::make('remarks')
                    ->label('Remarks'),

                TextEntry::make('creator.name')
                    ->label('Created By'),

                TextEntry::make('updater.name')
                    ->label('Updated By'),

                TextEntry::make('created_at')
                    ->label('Created At')
                    ->dateTime(),

                TextEntry::make('updated_at')
                    ->label('Updated At')
                    ->dateTime(),
            ]);
    }
}

