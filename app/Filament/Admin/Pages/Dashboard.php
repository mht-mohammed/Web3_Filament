<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\DatePicker;


class Dashboard extends BaseDashboard
{
    use HasFiltersForm;

        public function filtersForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        DatePicker::make('startDate')->live(),
                        DatePicker::make('endDate')->live(),
                        // ...
                    ])
                    ->columns(3)
                    ->columnSpanFull(),

            ]);
    }
}