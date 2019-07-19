<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Models\Fuente;
use App\Http\Resources\FuentesResource;

class FuentesController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuentes = Fuente::all();
        return FuentesResource::collection($fuentes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Fuente $fuente)
    {
        return response()->json(['data'=>$fuente], 200);
    }
}
