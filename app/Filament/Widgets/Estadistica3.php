<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class Estadistica3 extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    'backgroundColor' => ['red','blue','green','yellow','orange','purple','pink','brown','gray','black','cyan','magenta','lightblue','lightgreen','lightyellow','lightorange','lightpurple','lightpink','lightbrown','lightgray','lightblack','lightwhite','lightcyan','lightmagenta'],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
