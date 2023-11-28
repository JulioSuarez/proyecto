<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Producto as IAKPI;
use App\Models\Categories as Categoria;
use App\Models\Suppliers;

class Estadistica0 extends BaseWidget
{
    protected static ?int $sort = 5;
    protected function getStats(): array
    {
        return [
            Stat::make('Productos', IAKPI::count()),
            Stat::make('Categorías', Categoria::count()),
            Stat::make('Proveedores',  Suppliers::count()),
            Stat::make('Ventas',  Suppliers::count()),
            // Stat::make('Proveedores',  Suppliers::query()->where('categoria_id', 1)->count()),
            // Stat::make('Almuerso',  IAKPI::query()->where('categoria_id', 2)->count()),
        ];
    }
}
