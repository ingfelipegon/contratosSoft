<?php

namespace App\Http\Controllers\Traslado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TrasladoRespuestaResource;

class PersonaTrasladoController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Persona $persona)
    {
        $traslados = $persona->traslados()->get();
        $trasladosRespuesta=new TrasladoRespuestaResource($traslados);
        return response(['message'=>'Coleccion de Traslados y repuestas por persona', 'traslados'=>$trasladosRespuesta]);   
    }
}
