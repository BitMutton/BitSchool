<?php

namespace App\Filament\AcademicManagementPanel\Resources\ClassSubjects;

use App\Filament\AcademicManagementPanel\Resources\ClassSubjects\Pages\CreateClassSubject;
use App\Filament\AcademicManagementPanel\Resources\ClassSubjects\Pages\EditClassSubject;
use App\Filament\AcademicManagementPanel\Resources\ClassSubjects\Pages\ListClassSubjects;
use App\Filament\AcademicManagementPanel\Resources\ClassSubjects\Pages\ViewClassSubject;
use App\Filament\AcademicManagementPanel\Resources\ClassSubjects\Schemas\ClassSubjectForm;
use App\Filament\AcademicManagementPanel\Resources\ClassSubjects\Schemas\ClassSubjectInfolist;
use App\Filament\AcademicManagementPanel\Resources\ClassSubjects\Tables\ClassSubjectsTable;
use App\Models\ClassSubject;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClassSubjectResource extends Resource
{
    protected static ?string $model = ClassSubject::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Class Subjects';

    public static function form(Schema $schema): Schema
    {
        return ClassSubjectForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ClassSubjectInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClassSubjectsTable::configure($table);
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
            'index' => ListClassSubjects::route('/'),
            'create' => CreateClassSubject::route('/create'),
            'view' => ViewClassSubject::route('/{record}'),
            'edit' => EditClassSubject::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
