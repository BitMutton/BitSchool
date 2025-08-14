<?php

namespace App\Filament\AcademicManagementPanel\Resources\Schools;

use App\Filament\AcademicManagementPanel\Resources\Schools\Pages\CreateSchool;
use App\Filament\AcademicManagementPanel\Resources\Schools\Pages\EditSchool;
use App\Filament\AcademicManagementPanel\Resources\Schools\Pages\ListSchools;
use App\Filament\AcademicManagementPanel\Resources\Schools\Pages\ViewSchool;
use App\Filament\AcademicManagementPanel\Resources\Schools\Schemas\SchoolForm;
use App\Filament\AcademicManagementPanel\Resources\Schools\Schemas\SchoolInfolist;
use App\Filament\AcademicManagementPanel\Resources\Schools\Tables\SchoolsTable;
use App\Models\School;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SchoolResource extends Resource
{
    protected static ?string $model = School::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'School Profile';

    public static function form(Schema $schema): Schema
    {
        return SchoolForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SchoolInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SchoolsTable::configure($table);
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
            'index' => ListSchools::route('/'),
            'create' => CreateSchool::route('/create'),
            'view' => ViewSchool::route('/{record}'),
            'edit' => EditSchool::route('/{record}/edit'),
        ];
    }
}
