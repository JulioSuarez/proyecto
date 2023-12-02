<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StreamController extends Controller
{
    public function en_vivo()
    {
        return view('VistasStream.en_vivo');
    }

    public function control()
    {
        return view('VistasStream.control');
    }
}
