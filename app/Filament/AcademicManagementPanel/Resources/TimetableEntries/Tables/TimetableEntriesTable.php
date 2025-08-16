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
                TextColumn::make('classSubject')
                    ->label('Class - Subject')
                    ->formatStateUsing(fn ($record) =>
                        ($record->classSubject?->schoolClass?->name ?? 'Unknown Class')
                        . ' - '
                        . ($record->classSubject?->subject?->name ?? 'Unknown Subject')
                    )
                    ->sortable(),

                TextColumn::make('day_of_week')
                    ->label('Day')
                    ->sortable(),

                TextColumn::make('bellSchedule.name')
                    ->label('Bell Schedule')
                    ->sortable(),

                TextColumn::make('period')
                    ->label('Period')
                    ->sortable(),

                TextColumn::make('room.name')
                    ->label('Room')
                    ->sortable(),

                TextColumn::make('staff')
                    ->label('Staff')
                    ->formatStateUsing(fn ($record) =>
                        trim(($record->staff?->first_name ?? '') . ' ' . ($record->staff?->last_name ?? ''))
                        ?: 'Unknown Staff'
                    )
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
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

