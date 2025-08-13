<?php

namespace App\Filament\Resources\ClassModels;

use App\Filament\Resources\ClassModels\Pages\CreateClassModel;
use App\Filament\Resources\ClassModels\Pages\EditClassModel;
use App\Filament\Resources\ClassModels\Pages\ListClassModels;
use App\Filament\Resources\ClassModels\Pages\ViewClassModel;
use App\Filament\Resources\ClassModels\Schemas\ClassModelForm;
use App\Filament\Resources\ClassModels\Schemas\ClassModelInfolist;
use App\Filament\Resources\ClassModels\Tables\ClassModelsTable;
use App\Models\ClassModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ClassModelResource extends Resource
{
    protected static ?string $model = ClassModel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Exam';

    public static function form(Schema $schema): Schema
    {
        return ClassModelForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ClassModelInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClassModelsTable::configure($table);
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
            'index' => ListClassModels::route('/'),
            'create' => CreateClassModel::route('/create'),
            'view' => ViewClassModel::route('/{record}'),
            'edit' => EditClassModel::route('/{record}/edit'),
        ];
    }
}
