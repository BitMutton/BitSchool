<?php

namespace App\Filament\AcademicManagementPanel\Resources\TimetableEntries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TimetableEntriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // ✅ Class + Subject name with custom sort
               TextColumn::make('classSubject')
    ->label('Class - Subject')
    ->formatStateUsing(fn($record) =>
        ($record->classSubject?->class?->name ?? 'Unknown Class')
        . ' - ' .
        ($record->classSubject?->subject?->name ?? 'Unknown Subject')
    )
    ->sortable(
        query: function (\Illuminate\Database\Eloquent\Builder $query, string $direction) {
            return $query
                ->join('class_subjects', 'timetable_entries.class_subject_id', '=', 'class_subjects.id')
                ->join('classes', 'class_subjects.class_id', '=', 'classes.id')
                ->join('subjects', 'class_subjects.subject_id', '=', 'subjects.id')
                ->orderByRaw("CONCAT(classes.name, ' - ', subjects.name) $direction")
                ->select('timetable_entries.*'); // 👈 keep base select clean
        }
    ),

                // ✅ Staff full name with custom sort
                TextColumn::make('staff')
                    ->label('Staff')
                    ->formatStateUsing(fn($record) =>
                        trim(($record->staff?->first_name ?? '') . ' ' . ($record->staff?->last_name ?? ''))
                    )
                    ->sortable(
                        query: function (Builder $query, string $direction) {
                            return $query
                                ->join('staff', 'timetable_entries.staff_id', '=', 'staff.id')
                                ->orderByRaw("CONCAT(staff.first_name, ' ', staff.last_name) $direction")
                                ->select('timetable_entries.*');
                        }
                    ),

                TextColumn::make('day_of_week')->sortable(),

                TextColumn::make('bellSchedule.name')
                    ->label('Bell Schedule')
                    ->sortable(),

                TextColumn::make('period')->sortable(),

                TextColumn::make('room.name')
                    ->label('Room')
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
            ->filters([])
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

