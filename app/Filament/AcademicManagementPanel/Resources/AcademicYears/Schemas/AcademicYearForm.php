<?php

namespace App\Filament\AcademicManagementPanel\Resources\AcademicYears\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AcademicYearForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('school_id')
                    ->relationship('school', 'name')
                    ->required(),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date')
                    ->required(),
                Select::make('status')
                    ->options(['active' => 'Active', 'archived' => 'Archived', 'upcoming' => 'Upcoming'])
                    ->default('upcoming')
                    ->required(),
                TextInput::make('created_by')
                    ->numeric(),
                TextInput::make('updated_by')
                    ->numeric(),
            ]);
    }
}
