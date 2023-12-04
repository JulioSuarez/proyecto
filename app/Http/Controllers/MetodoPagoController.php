<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetodoPagoController extends Controller
{
    public function suscripciones_index(){
        return view('VistasMetodoPago.suscripciones_index');
    }

    public function realizar_pago($suscripcion){
        //buscar que suscripcion es

        return view('VistasMetodoPago.realizar_pago', compact('suscripcion'));
    }
}
