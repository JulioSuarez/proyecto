<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class Estadistica2 extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
            'datasets' => [
                [
                    'label' => 'Ventas uno',
                    'data' => [0, 10, 5, 2, 21, 32],
                    'borderColor' => ['red'],
                ],
                [
                    'label' => 'Ventas dos',
                    'data' => [13, 30, 35, 42, 51, 62],
                    'borderColor' => ['green'],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
