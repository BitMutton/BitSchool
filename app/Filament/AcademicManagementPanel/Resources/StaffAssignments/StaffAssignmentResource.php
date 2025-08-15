<?php

namespace App\Filament\AcademicManagementPanel\Resources\StaffAssignments;

use App\Filament\AcademicManagementPanel\Resources\StaffAssignments\Pages\CreateStaffAssignment;
use App\Filament\AcademicManagementPanel\Resources\StaffAssignments\Pages\EditStaffAssignment;
use App\Filament\AcademicManagementPanel\Resources\StaffAssignments\Pages\ListStaffAssignments;
use App\Filament\AcademicManagementPanel\Resources\StaffAssignments\Pages\ViewStaffAssignment;
use App\Filament\AcademicManagementPanel\Resources\StaffAssignments\Schemas\StaffAssignmentForm;
use App\Filament\AcademicManagementPanel\Resources\StaffAssignments\Schemas\StaffAssignmentInfolist;
use App\Filament\AcademicManagementPanel\Resources\StaffAssignments\Tables\StaffAssignmentsTable;
use App\Models\StaffAssignment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StaffAssignmentResource extends Resource
{
    protected static ?string $model = StaffAssignment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Staff Assignments';

    public static function form(Schema $schema): Schema
    {
        return StaffAssignmentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StaffAssignmentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StaffAssignmentsTable::configure($table);
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
            'index' => ListStaffAssignments::route('/'),
            'create' => CreateStaffAssignment::route('/create'),
            'view' => ViewStaffAssignment::route('/{record}'),
            'edit' => EditStaffAssignment::route('/{record}/edit'),
        ];
    }
}
