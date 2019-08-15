<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EstadoCustodiaResource;
use App\Models\EstadoCustodia;

class EstadosCustodiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = EstadoCustodia::all();
        return EstadoCustodiaResource::collection($estados);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoCustodia $estadosCustodium)
    {
        return response()->json(['data'=>$estadosCustodium], 200);
    }
}
