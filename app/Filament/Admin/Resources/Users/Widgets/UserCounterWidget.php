<?php

namespace App\Filament\Admin\Resources\Users\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;

class UserCounterWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make("Total Users", User::count())
            ->description("Total number of users of this year")
            ->color("success"),
            Stat::make("Total Users From India", User::whereHas("country",fn ($q) => $q->where("name","KhanYonies"))->count()),
            Stat::make("Total Users From India", User::whereHas("country",fn ($q) => $q->where("name","gaza"))->count()),
            
        ];
    }
}
