<?php

namespace App\Filament\AcademicManagementPanel\Resources\StaffAssignments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StaffAssignmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('staff.full_name')
                    ->label('Staff')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('role.name')
                    ->label('Role')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('grade.name')
                    ->label('Grade')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('subject.name')
                    ->label('Subject')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('academicYearLabel')
                    ->label('Academic Year')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

