<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Producto as IAKPI;
use App\Models\Categoria;

class Estadistica0 extends BaseWidget
{
    protected static ?int $sort = 5;
    protected function getStats(): array
    {
        return [
            Stat::make('Productos', IAKPI::count()),
            Stat::make('Categorías', Categoria::count()),
            Stat::make('Ensaladas',  IAKPI::query()->where('categoria_id', 1)->count()),
            Stat::make('Almuerso',  IAKPI::query()->where('categoria_id', 2)->count()),
        ];
    }
}
