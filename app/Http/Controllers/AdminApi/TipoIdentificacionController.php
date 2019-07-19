<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Models\TipoIdentificacion;
use App\Http\Resources\TiposIdentificacionResource;

class TipoIdentificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposIdentificacion = TipoIdentificacion::all();
        return TiposIdentificacionResource::collection($tiposIdentificacion);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TipoIdentificacion $tipoIdentificacion)
    {
        return response()->json(['data'=>$tipoIdentificacion], 200);
        
    }
}
