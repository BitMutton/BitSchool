<?php

namespace App\Filament\AcademicManagementPanel\Resources\StaffRoles;

use App\Filament\AcademicManagementPanel\Resources\StaffRoles\Pages\CreateStaffRole;
use App\Filament\AcademicManagementPanel\Resources\StaffRoles\Pages\EditStaffRole;
use App\Filament\AcademicManagementPanel\Resources\StaffRoles\Pages\ListStaffRoles;
use App\Filament\AcademicManagementPanel\Resources\StaffRoles\Pages\ViewStaffRole;
use App\Filament\AcademicManagementPanel\Resources\StaffRoles\Schemas\StaffRoleForm;
use App\Filament\AcademicManagementPanel\Resources\StaffRoles\Schemas\StaffRoleInfolist;
use App\Filament\AcademicManagementPanel\Resources\StaffRoles\Tables\StaffRolesTable;
use App\Models\StaffRole;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StaffRoleResource extends Resource
{
    protected static ?string $model = StaffRole::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Staff Roles';

    public static function form(Schema $schema): Schema
    {
        return StaffRoleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StaffRoleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StaffRolesTable::configure($table);
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
            'index' => ListStaffRoles::route('/'),
            'create' => CreateStaffRole::route('/create'),
            'view' => ViewStaffRole::route('/{record}'),
            'edit' => EditStaffRole::route('/{record}/edit'),
        ];
    }
}
