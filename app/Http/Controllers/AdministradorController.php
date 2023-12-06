<?php

namespace App\Http\Controllers;

use App\Models\User;

use Laravel\Cashier\Invoice;
use Illuminate\Http\Request;


class AdministradorController extends Controller
{
    public function dashboard()
    {

        $users = User::all();
        // $invoices = $users->invoices();
        $clientes = [];
        $ingresos = [];
        $fechas = [];
        $total = 0;
        foreach ($users as $user) {
            $invoices = $user->invoices();
            foreach ($invoices as $invoice) {
                // $clientes[] = $invoice->customer;
                $clientes[] = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'invoice_data' => $invoice->date()->toFormattedDateString(),
                    'invoice_total' => $invoice->total()
                ];
                $total += intval(substr($invoice->total(), 1));
                $ingresos[] = intval(substr($invoice->total(), 1));
                $fechas[] = $invoice->date()->toFormattedDateString();
            }
        }

        // dd($clientes, $total, $ingresos, $fechas);

        return view('business.admin.dashboard', compact(
            'clientes',
            'total',
            'ingresos',
            'fechas'
        ));
    }
}
