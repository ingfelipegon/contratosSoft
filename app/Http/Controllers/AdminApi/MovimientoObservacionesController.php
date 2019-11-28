<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MovimientoObservacionResource;
use App\Models\Movimiento;

class MovimientoObservacionesController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Movimiento $movimiento)
    {
        $observaciones = $movimiento->observaciones;             
        return MovimientoObservacionResource::collection($observaciones);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MovimientoObservacion $movimientoObservacion)
    {
        return response(['data'=>new MovimientoObservacionResource($movimientoObservacion)]);
    }
}
