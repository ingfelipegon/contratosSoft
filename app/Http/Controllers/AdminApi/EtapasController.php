<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Http\Resources\EtapasResource;
use App\Models\Etapa;

class EtapasController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etapas = Etapa::all();
        return EtapasResource::collection($etapas);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Etapa $etapa)
    {
        return response()->json(['data'=>$etapa], 200);
    }
}
