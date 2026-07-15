<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
class UserPieChartWidget extends ChartWidget
{

    protected ?string $heading = 'User Pie Chart Widget';  

    protected static ?int $sort = 3 ; 


    protected function getData(): array
    {

            $data = Trend::model(User::class)
                    ->between(
                        start: now()->startOfYear(),
                        end: now()->endOfYear(),
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
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 99, 255)',
                        'rgb(99, 255, 132)',
                        'rgb(132, 99, 255)',
                        'rgb(255, 255, 99)',
                        'rgb(99, 255, 255)',
                        'rgb(255, 132, 99)',
                    ]
                ]
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}