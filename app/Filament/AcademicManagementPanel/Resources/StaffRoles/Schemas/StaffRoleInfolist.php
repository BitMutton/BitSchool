<?php

namespace App\Filament\AcademicManagementPanel\Resources\StaffRoles\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StaffRoleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('school.name')
                    ->label('School'),

                TextEntry::make('name')
                    ->label('Role Name'),

                TextEntry::make('description')
                    ->label('Description'),

                TextEntry::make('created_at')
                    ->label('Created At')
                    ->dateTime(),

                TextEntry::make('updated_at')
                    ->label('Updated At')
                    ->dateTime(),
            ]);
    }
}

