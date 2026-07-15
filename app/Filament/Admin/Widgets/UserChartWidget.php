<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Flowframe\Trend\TrendValue;
use App\Models\User;


class UserChartWidget extends ChartWidget
{

    use InteractsWithPageFilters;

    protected ?string $heading = 'New Registered User Chart'; 

    protected string $color = 'success' ;

    protected static ?int $sort = 2 ; 


    protected function getData(): array
    {

        $startDate = $this->pageFilters['startDate'] ?? null;
        $endDate = $this->pageFilters['endDate'] ?? null;

        $start = $startDate ? now()->parse($startDate)->startOfDay() : now()->startOfYear();
        $end = $endDate ? now()->parse($endDate)->endOfDay() : now()->endOfYear();

            $data = Trend::model(User::class)
                    ->between(
                        start: $start,
                        end: $end,
                    )
                    ->perMonth()
                    ->count();

        return [
            'datasets' => [
                [
                    'label' => 'User Created',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ]
                ]
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}

