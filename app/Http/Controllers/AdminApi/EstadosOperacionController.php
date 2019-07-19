<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Models\EstadoOperacion;
use App\Http\Resources\EstadoOperacionResource;

class EstadosOperacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = EstadoOperacion::all();
        return EstadoOperacionResource::collection($estados);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoOperacion $estadoOperacion)
    {
        return response()->json(['data'=>$estadoOperacion], 200);
    }
}
