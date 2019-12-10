<?php

namespace App\Http\Controllers\Traslado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Models\Bloque;

class PersonaBloqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Persona $persona)
    {
        $bloques = $persona->bloques()
                        ->get();
                        // ->unique()
                        // ->values();

        return response()->json(['data'=>$bloques], 200);        
    }
}
