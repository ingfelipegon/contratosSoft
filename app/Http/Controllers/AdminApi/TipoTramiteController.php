<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Models\TipoTramite;
use App\Http\Resources\TiposTramiteResource;

class TipoTramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposTramite = TipoTramite::all();
        return TiposTramiteResource::collection($tiposTramite);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TipoTramite $tiposTramite)
    {
        return response()->json(['data'=>$tiposTramite], 200);
    }
}
