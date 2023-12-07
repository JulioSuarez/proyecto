<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Suscripcion;
use Illuminate\Http\Request;


class MetodoPagoController extends Controller
{
   
    public function pago_suscripcion(){
        //buscar que suscripcion es
        // dd('llegue x2');
        $suscripcion = Suscripcion::where('id', 1)->first();

        return view('business.payment.realizar_pago',  compact('suscripcion') );
    }

    
    
    public function store_index(){
        //buscar que suscripcion es
        // dd('llegue x2');
        // $suscripcion = Suscripcion::where('id', 1)->first();

        return view('business.payment.store_index',  );
    }
}
