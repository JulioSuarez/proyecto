<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\User;
use Laravel\Cashier\Billable;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Subscription;
use Stripe\Account;
use Stripe\PaymentIntent;
use Laravel\Cashier\Invoice;


class Estadistica0 extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        $user = User::find(1);
        $invoices = $user->invoices();

        Stripe::setApiKey('sk_test_51MzGDiJrLfX1VoDJz2FPtoRQFMBWuqQsLVmO7LaVJLPh4D6mBdSywTuQ3FjMqeqomeHGExVzselA3M4PFhkZz0w100qp3BS5v5');

        try {
            $customers = Customer::all();
            $customers2 = Subscription::all();
            $customers4 = Account::all();

            // return response()->json($customers);
            return [
                // Stat::make('Usuarios', $customers),
                // Stat::make('Usuarios2', $customers2),
                // Stat::make('Usuarios4', $customers4),
                // Stat::make('Usuarios5', $invoices->date()->toFormattedDateString()),
                Stat::make('Usuarios6', $invoices->total()),
            ];
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }


        // $users = User::with('subscriptions')->whereHas('syncStripeCustomerDetails', function ($query) {
        //     $query->where('payment_method', '!=', null);
        // })->get();

        // $users = User::with('syncStripeCustomerDetails')->get();



        // return [
        //     Stat::make('Usuarios', $customers->count()),
        //     Stat::make('Clientes', User::count()),
        //     // Stat::make('Proveedores',  Suppliers::count()),
        //     // Stat::make('Ventas',  Suppliers::count()),
        //     // Stat::make('Proveedores',  Suppliers::query()->where('categoria_id', 1)->count()),
        //     // Stat::make('Almuerso',  Producto::query()->where('categoria_id', 2)->count()),
        // ];
    }
}
