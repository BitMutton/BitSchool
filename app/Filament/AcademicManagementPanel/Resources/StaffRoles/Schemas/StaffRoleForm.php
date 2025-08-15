<?php

namespace App\Filament\AcademicManagementPanel\Resources\StaffRoles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class StaffRoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('school_id')
                    ->label('School')
                    ->relationship('school', 'name')
                    ->required(),

                TextInput::make('name')
                    ->label('Role Name')
                    ->required()
                    ->maxLength(100),

                Textarea::make('description')
                    ->label('Description')
                    ->columnSpanFull()
                    ->maxLength(500),
            ]);
    }
}

