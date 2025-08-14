<?php

namespace App\Filament\Scheduling\Resources\TimetableEntries;

use App\Filament\Scheduling\Resources\TimetableEntries\Pages\CreateTimetableEntry;
use App\Filament\Scheduling\Resources\TimetableEntries\Pages\EditTimetableEntry;
use App\Filament\Scheduling\Resources\TimetableEntries\Pages\ListTimetableEntries;
use App\Filament\Scheduling\Resources\TimetableEntries\Pages\ViewTimetableEntry;
use App\Filament\Scheduling\Resources\TimetableEntries\Schemas\TimetableEntryForm;
use App\Filament\Scheduling\Resources\TimetableEntries\Schemas\TimetableEntryInfolist;
use App\Filament\Scheduling\Resources\TimetableEntries\Tables\TimetableEntriesTable;
use App\Models\TimetableEntry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TimetableEntryResource extends Resource
{
    protected static ?string $model = TimetableEntry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Time Table';

    public static function form(Schema $schema): Schema
    {
        return TimetableEntryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TimetableEntryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TimetableEntriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTimetableEntries::route('/'),
            'create' => CreateTimetableEntry::route('/create'),
            'view' => ViewTimetableEntry::route('/{record}'),
            'edit' => EditTimetableEntry::route('/{record}/edit'),
        ];
    }
}
