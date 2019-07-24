<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Models\Unidad;
use App\Http\Resources\UnidadResource;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidadesTramite = Unidad::all();
        return UnidadResource::collection($unidadesTramite);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Unidad $unidade)
    {
        return response()->json(['data'=>$unidade], 200);
    }
}
