<?php

namespace App\Filament\AcademicManagementPanel\Resources\Subjects;

use App\Filament\AcademicManagementPanel\Resources\Subjects\Pages\CreateSubject;
use App\Filament\AcademicManagementPanel\Resources\Subjects\Pages\EditSubject;
use App\Filament\AcademicManagementPanel\Resources\Subjects\Pages\ListSubjects;
use App\Filament\AcademicManagementPanel\Resources\Subjects\Pages\ViewSubject;
use App\Filament\AcademicManagementPanel\Resources\Subjects\Schemas\SubjectForm;
use App\Filament\AcademicManagementPanel\Resources\Subjects\Schemas\SubjectInfolist;
use App\Filament\AcademicManagementPanel\Resources\Subjects\Tables\SubjectsTable;
use App\Models\Subject;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SubjectResource extends Resource
{
    protected static ?string $model = Subject::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Subject';

    public static function form(Schema $schema): Schema
    {
        return SubjectForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SubjectInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubjectsTable::configure($table);
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
            'index' => ListSubjects::route('/'),
            'create' => CreateSubject::route('/create'),
            'view' => ViewSubject::route('/{record}'),
            'edit' => EditSubject::route('/{record}/edit'),
        ];
    }
}
