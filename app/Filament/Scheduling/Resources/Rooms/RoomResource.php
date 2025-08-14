<?php

namespace App\Filament\Scheduling\Resources\Rooms;

use App\Filament\Scheduling\Resources\Rooms\Pages\CreateRoom;
use App\Filament\Scheduling\Resources\Rooms\Pages\EditRoom;
use App\Filament\Scheduling\Resources\Rooms\Pages\ListRooms;
use App\Filament\Scheduling\Resources\Rooms\Pages\ViewRoom;
use App\Filament\Scheduling\Resources\Rooms\Schemas\RoomForm;
use App\Filament\Scheduling\Resources\Rooms\Schemas\RoomInfolist;
use App\Filament\Scheduling\Resources\Rooms\Tables\RoomsTable;
use App\Models\Room;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Rooms';

    public static function form(Schema $schema): Schema
    {
        return RoomForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RoomInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RoomsTable::configure($table);
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
            'index' => ListRooms::route('/'),
            'create' => CreateRoom::route('/create'),
            'view' => ViewRoom::route('/{record}'),
            'edit' => EditRoom::route('/{record}/edit'),
        ];
    }
}
