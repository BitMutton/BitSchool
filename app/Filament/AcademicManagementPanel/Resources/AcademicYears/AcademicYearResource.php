<?php

namespace App\Filament\AcademicManagementPanel\Resources\AcademicYears;

use App\Filament\AcademicManagementPanel\Resources\AcademicYears\Pages\CreateAcademicYear;
use App\Filament\AcademicManagementPanel\Resources\AcademicYears\Pages\EditAcademicYear;
use App\Filament\AcademicManagementPanel\Resources\AcademicYears\Pages\ListAcademicYears;
use App\Filament\AcademicManagementPanel\Resources\AcademicYears\Pages\ViewAcademicYear;
use App\Filament\AcademicManagementPanel\Resources\AcademicYears\Schemas\AcademicYearForm;
use App\Filament\AcademicManagementPanel\Resources\AcademicYears\Schemas\AcademicYearInfolist;
use App\Filament\AcademicManagementPanel\Resources\AcademicYears\Tables\AcademicYearsTable;
use App\Models\AcademicYear;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AcademicYearResource extends Resource
{
    protected static ?string $model = AcademicYear::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Academic Year';

    public static function form(Schema $schema): Schema
    {
        return AcademicYearForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AcademicYearInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AcademicYearsTable::configure($table);
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
            'index' => ListAcademicYears::route('/'),
            'create' => CreateAcademicYear::route('/create'),
            'view' => ViewAcademicYear::route('/{record}'),
            'edit' => EditAcademicYear::route('/{record}/edit'),
        ];
    }
}
