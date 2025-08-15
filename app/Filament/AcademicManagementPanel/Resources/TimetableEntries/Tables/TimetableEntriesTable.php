<?php

namespace App\Filament\AcademicManagementPanel\Resources\TimetableEntries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TimetableEntriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('classSubjectDisplay')
                    ->label('Class & Subject')
                    ->sortable()
                    ->searchable(),

               TextColumn::make('staff.full_name')
    ->label('Teacher')
    ->sortable()
    ->searchable(),


                TextColumn::make('day_of_week')
                    ->label('Day')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('bellSchedule.name')
                    ->label('Bell Schedule')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('period')
                    ->label('Period')
                    ->sortable(),

                TextColumn::make('room.name')
                    ->label('Room')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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

