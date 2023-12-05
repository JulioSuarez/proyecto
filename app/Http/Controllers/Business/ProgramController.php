<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Programs;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('business.programs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Programs $program)
    {
        return view('business.programs.show', compact('program'));
    }
}
