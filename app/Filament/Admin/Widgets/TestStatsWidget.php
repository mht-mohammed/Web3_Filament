<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;


class TestStatsWidget extends StatsOverviewWidget
{

    protected static ?int $sort = 1 ; 

    use InteractsWithPageFilters;


    protected function getStats(): array
    {

        $startDate = $this->pageFilters['startDate'] ?? null;
        $endDate = $this->pageFilters['endDate'] ?? null;

        return [
            Stat::make("Total Users", User::query()
                    ->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                    ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                    ->count(),)
                ->description("Total number of users of this year")
                // ->chart([
                //     2,4,6,7,15,15,17
                // ])
                ->chart(
                    User::selectRaw("MONTH(created_at) as month, COUNT(*) as count")
                        ->whereYear("created_at", now()->year)
                        ->groupBy("month")
                        ->orderBy("month")
                        ->pluck("count")
                        ->toArray()
                )
                ->descriptionColor("success")
                ->color("success"),
            Stat::make("Total Posts", Post::count("id"))
                ->description("Total number of posts of this year")
                ->chart(
                    Post::selectRaw("MONTH(created_at) as month, COUNT(*) as count")
                        ->whereYear("created_at", now()->year)
                        ->groupBy("month")
                        ->orderBy("month")
                        ->pluck("count")
                        ->toArray()
                )
                ->descriptionColor("warning")
                ->color("warning"),
            Stat::make("Total Products", Product::count("id"))
                ->description("Total number of products of this year")
                ->chart(
                    Product::selectRaw("MONTH(created_at) as month, COUNT(*) as count")
                        ->whereYear("created_at", now()->year)
                        ->groupBy("month")
                        ->orderBy("month")
                        ->pluck("count")
                        ->toArray()
                )
                ->descriptionColor("info")
                ->color("info")
        ];
    }
}