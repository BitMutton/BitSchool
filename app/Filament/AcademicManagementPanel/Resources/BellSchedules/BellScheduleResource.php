<?php

namespace App\Filament\AcademicManagementPanel\Resources\BellSchedules;

use App\Filament\AcademicManagementPanel\Resources\BellSchedules\Pages\CreateBellSchedule;
use App\Filament\AcademicManagementPanel\Resources\BellSchedules\Pages\EditBellSchedule;
use App\Filament\AcademicManagementPanel\Resources\BellSchedules\Pages\ListBellSchedules;
use App\Filament\AcademicManagementPanel\Resources\BellSchedules\Pages\ViewBellSchedule;
use App\Filament\AcademicManagementPanel\Resources\BellSchedules\Schemas\BellScheduleForm;
use App\Filament\AcademicManagementPanel\Resources\BellSchedules\Schemas\BellScheduleInfolist;
use App\Filament\AcademicManagementPanel\Resources\BellSchedules\Tables\BellSchedulesTable;
use App\Models\BellSchedule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BellScheduleResource extends Resource
{
    protected static ?string $model = BellSchedule::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Bell Schedule';

    public static function form(Schema $schema): Schema
    {
        return BellScheduleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BellScheduleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BellSchedulesTable::configure($table);
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
            'index' => ListBellSchedules::route('/'),
            'create' => CreateBellSchedule::route('/create'),
            'view' => ViewBellSchedule::route('/{record}'),
            'edit' => EditBellSchedule::route('/{record}/edit'),
        ];
    }
}
