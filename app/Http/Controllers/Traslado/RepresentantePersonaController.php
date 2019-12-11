<?php

namespace App\Http\Controllers\Traslado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Representante;

class RepresentantePersonaController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Representante $representante)
    {
        $personas = $representante->personas()->get();                        
        return response()->json(['data'=>$personas], 200);     
    }
}
