<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Models\Modalidad;
use App\Http\Resources\ModalidadesResource;

class ModalidadesController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modadlidades = Modalidad::all();
        $modadlidades = $modadlidades->whereIn('id', array(1, 2, 3, 4, 5));        
        return ModalidadesResource::collection($modadlidades);
    }

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function modalidadesPostcontractual()
    {
        $modadlidades = Modalidad::all();
        $modadlidades = $modadlidades->whereIn('id', array(6, 7, 8, 9, 10, 11, 12));
        return ModalidadesResource::collection($modadlidades);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Modalidad $modalidade)
    {
        return response()->json(['data'=>$modalidade], 200);
        
    }
}
