<?php

namespace App\Http\Controllers;

use App\Models\Suscripcion;
use Illuminate\Http\Request;

class MetodoPagoController extends Controller
{
    // public function suscripciones_index()
    // {
    //     $suscripcions = Suscripcion::all();
    //     return view('VistasMetodoPago.suscripciones_index', compact('suscripcions'));
    // }

    public function pago_suscripcion(){
        //buscar que suscripcion es
        // dd('llegue x2');
        $suscripcion = Suscripcion::where('id', 1)->first();

        return view('VistasMetodoPago.realizar_pago',  compact('suscripcion') );
    }

    // public function suscripciones_cancelar(Suscripcion $suscripcion ){
    //     //cancelar suscripcion
    //     // dd('cancelar suscripcion');
    //     auth()->user()->subscription('suscripcion')->cancel();
        
    //     return redirect()->route('suscripciones.index')->with('success', 'Se cancelo la suscripcion con exito');
    // }
}
