<?php

namespace App\Filament\Admin\Widgets;

use App\Models\User;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;


class TestStatsWidget extends StatsOverviewWidget
{

    protected static ?int $sort = 1 ; 

    use InteractsWithPageFilters;

    private function getChartData(Builder $query): array
    {
        $data = $query
            ->selectRaw("MONTH(created_at) as month, COUNT(*) as count")
            ->groupBy("month")
            ->orderBy("month")
            ->pluck("count", "month")
            ->toArray();

        $padded = array_fill(1, 12, 0);
        foreach ($data as $month => $count) {
            $padded[(int) $month] = $count;
        }

        return array_values($padded);
    }

    protected function getStats(): array
    {

        $startDate = $this->pageFilters['startDate'] ?? null;
        $endDate = $this->pageFilters['endDate'] ?? null;

        $userQuery = User::query()
            ->when($startDate, fn (Builder $q) => $q->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn (Builder $q) => $q->whereDate('created_at', '<=', $endDate));

        $palestineQuery = User::whereHas('country', fn (Builder $q) => $q->where('name', 'Palestine'))
            ->when($startDate, fn (Builder $q) => $q->whereDate('users.created_at', '>=', $startDate))
            ->when($endDate, fn (Builder $q) => $q->whereDate('users.created_at', '<=', $endDate));

        $egyptQuery = User::whereHas('country', fn (Builder $q) => $q->where('name', 'Egypt'))
            ->when($startDate, fn (Builder $q) => $q->whereDate('users.created_at', '>=', $startDate))
            ->when($endDate, fn (Builder $q) => $q->whereDate('users.created_at', '<=', $endDate));

        return [
            Stat::make("Total Users", $userQuery->count())
                ->description("Total number of users")
                ->descriptionIcon(Heroicon::ArrowTrendingUp)
                ->chart($this->getChartData(clone $userQuery))
                ->descriptionColor("success")
                ->color("success"),
            Stat::make("Total Users From Palestine", $palestineQuery->count())
                ->description("Users located in Palestine")
                ->descriptionIcon(Heroicon::ArrowTrendingUp)
                ->chart($this->getChartData(clone $palestineQuery))
                ->descriptionColor("info")
                ->color("info"),
            Stat::make("Total Users From Egypt", $egyptQuery->count())
                ->description("Users located in Egypt")
                ->descriptionIcon(Heroicon::ArrowTrendingUp)
                ->chart($this->getChartData(clone $egyptQuery))
                ->descriptionColor("warning")
                ->color("warning"),
        ];
    }
}
