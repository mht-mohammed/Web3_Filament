<?php

namespace App\Filament\Admin\Resources\Users\Widgets;

use Filament\Support\Icons\Heroicon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserCounterWidget extends StatsOverviewWidget
{
    use InteractsWithPageFilters;

    // protected function getStats(): array
    // {
    //     $startDate = $this->pageFilters['startDate'] ?? null;
    //     $endDate = $this->pageFilters['endDate'] ?? null;

    //     $userQuery = User::query()
    //         ->when($startDate, fn (Builder $q) => $q->whereDate('created_at', '>=', $startDate))
    //         ->when($endDate, fn (Builder $q) => $q->whereDate('created_at', '<=', $endDate));

    //     $palestineQuery = User::whereHas("country", fn ($q) => $q->where("name", "Palestine"))
    //         ->when($startDate, fn (Builder $q) => $q->whereDate('users.created_at', '>=', $startDate))
    //         ->when($endDate, fn (Builder $q) => $q->whereDate('users.created_at', '<=', $endDate));

    //     $egyptQuery = User::whereHas("country", fn ($q) => $q->where("name", "Egypt"))
    //         ->when($startDate, fn (Builder $q) => $q->whereDate('users.created_at', '>=', $startDate))
    //         ->when($endDate, fn (Builder $q) => $q->whereDate('users.created_at', '<=', $endDate));

    //     return [
    //         Stat::make("Total Users", $userQuery->count())
    //             ->description("Total number of users")
    //             ->descriptionIcon(Heroicon::ArrowTrendingUp)
    //             ->color("success"),
    //         Stat::make("Total Users From Palestine", $palestineQuery->count())
    //             ->description("Users located in Palestine")
    //             ->descriptionIcon(Heroicon::ArrowTrendingUp)
    //             ->color("info"),
    //         Stat::make("Total Users From Egypt", $egyptQuery->count())
    //             ->description("Users located in Egypt")
    //             ->descriptionIcon(Heroicon::ArrowTrendingUp)
    //             ->color("warning"),
    //     ];
    // }
}
