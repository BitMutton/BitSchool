<?php

namespace App\Filament\Resources\Invoices\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InvoiceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('student_id')
                    ->numeric(),
                TextEntry::make('fee_structure_id')
                    ->numeric(),
                TextEntry::make('issue_date')
                    ->date(),
                TextEntry::make('due_date')
                    ->date(),
                TextEntry::make('status'),
            ]);
    }
}
