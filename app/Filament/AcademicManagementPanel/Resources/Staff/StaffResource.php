<?php

namespace App\Filament\AcademicManagementPanel\Resources\Staff;

use App\Filament\AcademicManagementPanel\Resources\Staff\Pages\CreateStaff;
use App\Filament\AcademicManagementPanel\Resources\Staff\Pages\EditStaff;
use App\Filament\AcademicManagementPanel\Resources\Staff\Pages\ListStaff;
use App\Filament\AcademicManagementPanel\Resources\Staff\Pages\ViewStaff;
use App\Filament\AcademicManagementPanel\Resources\Staff\Schemas\StaffForm;
use App\Filament\AcademicManagementPanel\Resources\Staff\Schemas\StaffInfolist;
use App\Filament\AcademicManagementPanel\Resources\Staff\Tables\StaffTable;
use App\Models\Staff;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Staff';

    public static function form(Schema $schema): Schema
    {
        return StaffForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StaffInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StaffTable::configure($table);
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
            'index' => ListStaff::route('/'),
            'create' => CreateStaff::route('/create'),
            'view' => ViewStaff::route('/{record}'),
            'edit' => EditStaff::route('/{record}/edit'),
        ];
    }
}
