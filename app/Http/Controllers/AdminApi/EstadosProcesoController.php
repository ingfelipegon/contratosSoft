<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Models\EstadoProceso;
use App\Http\Resources\EstadosProcesoResource;

class EstadosProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = EstadoProceso::all();
        return EstadosProcesoResource::collection($estados);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoProceso $estadosProceso)
    {
        return response()->json(['data'=>$estadosProceso], 200);
    }
}
